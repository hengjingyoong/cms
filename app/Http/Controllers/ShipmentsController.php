<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipments = Shipment::paginate(6);
        return view('shipments.index')->withShipments($shipments);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipment = Shipment::find($id);
        $source = Warehouse::find($shipment->source_id);
        $destination = Warehouse::find($shipment->destination_id);
        return view('shipments.show')->withShipment($shipment)->withSource($source)->withDestination($destination);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipment = Shipment::find($id);
        $warehouses = Warehouse::all();
        return view('shipments.edit')->withShipment($shipment)->withWarehouses($warehouses);
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
        $shipment = Shipment::find($id);

        $this->validate($request,array(
            'shipping_date' => 'required',
            'arrival_date' => 'required'
        ));

        $shipment->type = $request->type;
        $shipment->source_id = $request->source_id;
        $shipment->destination_id = $request->destination_id;
        $shipment->shipping_date = $request->shipping_date;
        $shipment->arrival_date = $request->arrival_date;
        $shipment->status = $request->status;
        $shipment->save();

        $notification = array(
            'title' => 'Shipment Updated',
            'message' => 'You have successfully updated the shipment!',
            'alert-type' => 'success'
        );
        return redirect()->route('shipment.show', $shipment->id)->with($notification);
    }
}
