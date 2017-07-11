@extends('layouts.app')

@section('title', '| Shipments')

@section('content')
    <div class="container">
        <h1>Shipments</h1>
        <hr>

        @if(count($shipments) == 0)
            <p>No Result Found...</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        @else
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:25%;">Customer Name</th>
                            <th style="width:15%;">Shipping Date</th>
                            <th style="width:15%;">Arrival Date</th>
                            <th style="width:15%;">Status</th>
                            <th style="width:25%;"></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($shipments as $shipment)
                            <tr>
                                <td>{{ $shipment->id }}</td>
                                <td>{{ $shipment->customer->name }}</td>
                                <td>{{ $shipment->shipping_date }}</td>
                                <td>{{ $shipment->arrival_date }}</td>
                                <td>{{ $shipment->status }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('shipment.show', $shipment->id) }}" class="btn btn-info btn-sm btn-block"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('shipment.edit', $shipment->id) }}" class="btn btn-primary btn-sm btn-block"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        {!! $shipments->links() !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
