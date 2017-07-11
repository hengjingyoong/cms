@extends('layouts.app')

@section('title', '| Container Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Container Details</h1>
                <hr>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Customer Name:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $container->customer->name }}
                    </div>
                </div>

                <div class="row form-spacing-top">
                    <div class="col-md-3">
                        <strong>Container Length (m):</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $container->length }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Container Width (m):</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $container->width }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Container Height (m):</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $container->height }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Container Volume (m3):</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $container->volume }}
                    </div>
                </div>

                <div class="row form-spacing-top">
                    <div class="col-md-3">
                        <strong>Container Weight (kg):</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $container->weight }}
                    </div>
                </div>

                <div class="row" style="margin-top:12px;">
                    <div class="col-md-2">
                        {{ Form::label('shipment_id', 'Shipment ID:', ['class' => 'form-spacing-top']) }}
                    </div>
                    <div class="col-md-1" style="margin-top: 8px;">
                        <p>{{ $container->shipment->id }}</p>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px;">
                        <strong><a href="{{ route('shipment.show', $container->shipment->id) }}">View Details</a></strong>
                    </div>
                </div>

                <div class="row" style="margin-top:30px;">
                    <div class="col-md-6">
                        <a href="{{ route('container.index') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('container.edit', $container->id) }}" class="btn btn-success btn-lg btn-block">Go Edit <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection