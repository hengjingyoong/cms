<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::paginate(6);
        return view('warehouses.index')->withWarehouses($warehouses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouses.create');
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
            "name" => 'required|min:8|max:100',
            'location' => 'required',
            'capacity' => 'required|integer'
        ));

        $warehouse = new Warehouse();
        $warehouse->name = $request->name;
        $warehouse->location = $request->location;
        $warehouse->capacity = $request->capacity;

        $warehouse->save();

        $notification = array(
            'title' => 'Warehouse Created',
            'message' => 'You have successfully created new warehouse!',
            'alert-type' => 'success'
        );
        return redirect()->route('warehouse.index', $warehouse->id)->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('warehouses.edit')->withWarehouse($warehouse);
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
        $warehouse = Warehouse::find($id);

        $this->validate($request,array(
            "name" => 'required|min:8|max:100',
            'location' => 'required',
            'capacity' => 'required|integer'
        ));

        $warehouse->name = $request->name;
        $warehouse->location = $request->location;
        $warehouse->capacity = $request->capacity;

        $warehouse->save();

        $notification = array(
            'title' => 'Warehouse Updated',
            'message' => 'You have successfully updated the warehouse!',
            'alert-type' => 'success'
        );
        return redirect()->route('warehouse.index', $warehouse->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();

        $notification = array(
            'title' => 'Warehouse Deleted',
            'message' => 'The warehouse was successfully deleted!',
            'alert-type' => 'success'
        );
        return redirect()->route('warehouse.index')->with($notification);
    }
}
