<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(6);
        return view('customers.index')->withCustomers($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            "name" => 'required|min:5|max:100',
            "company" => 'nullable|min:8|max:100',
            'location' => 'required'
        ));

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->company = $request->company;
        $customer->location = $request->location;

        $customer->save();

        $notification = array(
            'title' => 'Customer Created',
            'message' => 'You have successfully created new customer!',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.index', $customer->id)->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit')->withCustomer($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $this->validate($request,array(
            "name" => 'required|min:5|max:100',
            "company" => 'nullable|min:8|max:100',
            'location' => 'required'
        ));

        $customer->name = $request->name;
        $customer->company = $request->company;
        $customer->location = $request->location;

        $customer->save();

        $notification = array(
            'title' => 'Customer Updated',
            'message' => 'You have successfully updated the customer!',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.index', $customer->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        $notification = array(
            'title' => 'Customer Deleted',
            'message' => 'The customer was successfully deleted!',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.index')->with($notification);
    }
}
