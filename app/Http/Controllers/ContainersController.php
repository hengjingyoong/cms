<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Customer;
use App\Models\Shipment;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ContainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $containers = Container::paginate(6);
        return view('containers.index')->withContainers($containers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $warehouses = Warehouse::all();
        return view('containers.create')->withCustomers($customers)->withWarehouses($warehouses);
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
            "length" => 'required|integer',
            "width" => 'required|integer',
            "height" => 'required|integer',
            "weight" => 'required|integer',
            'shipping_date' => 'required',
            'arrival_date' => 'required'
        ));

        $container = new Container();
        $container->length = $request->length;
        $container->width = $request->width;
        $container->height = $request->height;
        $container->volume = $request->length * $request->width * $request->height;
        $container->weight = $request->weight;
        $container->customer_id = $request->customer_id;
        $container->save();

        $shipment = new Shipment();
        $shipment->type = $request->type;
        $shipment->source_id = $request->source_id;
        $shipment->destination_id = $request->destination_id;
        $shipment->shipping_date = $request->shipping_date;
        $shipment->arrival_date = $request->arrival_date;
        $shipment->status = 'Pending';
        $shipment->customer_id = $request->customer_id;
        $shipment->container_id = $container->id;
        $shipment->save();

        $notification = array(
            'title' => 'Container Created',
            'message' => 'You have successfully created new container!',
            'alert-type' => 'success'
        );
        return redirect()->route('container.index', $container->id)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $container = Container::find($id);
        return view('containers.show')->withContainer($container);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $container = Container::find($id);
        return view('containers.edit')->withContainer($container);
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
        $container = Container::find($id);

        $this->validate($request,array(
            "length" => 'required|integer',
            "width" => 'required|integer',
            "height" => 'required|integer',
            "weight" => 'required|integer'
        ));

        $container->length = $request->length;
        $container->width = $request->width;
        $container->height = $request->height;
        $container->volume = $request->length * $request->width * $request->height;
        $container->weight = $request->weight;
        $container->save();

        $notification = array(
            'title' => 'Container Updated',
            'message' => 'You have successfully updated the container!',
            'alert-type' => 'success'
        );
        return redirect()->route('container.show', $container->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $container = Container::find($id);
        $container->delete();

        $notification = array(
            'title' => 'Container Deleted',
            'message' => 'The container was successfully deleted!',
            'alert-type' => 'success'
        );
        return redirect()->route('container.index')->with($notification);
    }
}
