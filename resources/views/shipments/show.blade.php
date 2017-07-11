@extends('layouts.app')

@section('title', '| Shipment Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Shipment Details</h1>
                <hr>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Customer Name:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $shipment->customer->name }}
                    </div>
                </div>

                <div class="row" style="margin-top:12px;">
                    <div class="col-md-2">
                        {{ Form::label('container_id', 'Container ID:', ['class' => 'form-spacing-top']) }}
                    </div>
                    <div class="col-md-1" style="margin-top: 8px;">
                        <p>{{ $shipment->container_id }}</p>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px;">
                        <strong><a href="{{ route('container.show', $shipment->container_id) }}">View Details</a></strong>
                    </div>
                </div>

                <div class="row form-spacing-top">
                    <div class="col-md-3">
                        <strong>Shipment Type:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $shipment->type }}
                    </div>
                </div>

                <div class="row form-spacing-top">
                    <div class="col-md-3">
                        <strong>Source:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $source->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Destination:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $destination->name }}
                    </div>
                </div>

                <div class="row form-spacing-top">
                    <div class="col-md-3">
                        <strong>Shipping Date:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $shipment->shipping_date }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Arrival Date:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $shipment->arrival_date }}
                    </div>
                </div>

                <div class="row form-spacing-top">
                    <div class="col-md-3">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $shipment->status }}
                    </div>
                </div>

                <div class="row" style="margin-top:30px;">
                    <div class="col-md-6">
                        <a href="{{ route('shipment.index') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('shipment.edit', $shipment->id) }}" class="btn btn-success btn-lg btn-block">Go Edit <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection