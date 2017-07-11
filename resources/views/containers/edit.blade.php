@extends('layouts.app')

@section('title', '| Edit Container')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit Container</h1>
                <hr>
                {!! Form::model($container,['route' => ['container.update', $container->id], 'method' => 'PUT']) !!}

                <div class="row">
                    <div class="col-md-3">
                        {{ Form::label('customer_id', 'Customer:') }}
                    </div>
                    <div class="col-md-9">
                        {{ $container->customer->name }}
                    </div>
                </div>

                {{ Form::label('volume', 'Container Volume (m3):', ['class' => 'form-spacing-top required']) }}
                {{ Form::text('length', null, [
                    'class'         => 'form-control',
                    'placeholder'   => 'length',
                    'required'      => ''
                ]) }}
                {{ Form::text('width', null, [
                    'class'         => 'form-control',
                    'placeholder'   => 'width',
                    'required'      => ''
                ]) }}
                {{ Form::text('height', null, [
                    'class'         => 'form-control',
                    'placeholder'   => 'height',
                    'required'      => ''
                ]) }}

                {{ Form::label('weight', 'Container Weight (kg):', ['class' => 'form-spacing-top required']) }}
                {{ Form::text('weight', null, [
                    'class'         => 'form-control',
                    'required'      => ''
                ]) }}

                <div class="row" style="margin-top:20px;">
                    <div class="col-md-2">
                        {{ Form::label('shipment_id', 'Shipment ID:', ['class' => 'form-spacing-top']) }}
                    </div>
                    <div class="col-md-1" style="margin-top: 8px;">
                        <p>{{ $container->shipment->id }}</p>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px;">
                        <strong><a href="{{ route('shipment.edit', $container->shipment->id) }}">Go Edit</a></strong>
                    </div>
                </div>

                <div class="row" style="margin-top:30px;">
                    <div class="col-md-6">
                        <a href="{{ route('container.index') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit Container
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection