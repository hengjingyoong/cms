@extends('layouts.app')

@section('title', '| Edit Shipment')

@section('stylesheets')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit Shipment</h1>
                <hr>
                {!! Form::model($shipment,['route' => ['shipment.update', $shipment->id], 'method' => 'PUT']) !!}

                <div class="row">
                    <div class="col-md-3">
                        {{ Form::label('customer_id', 'Customer:') }}
                    </div>
                    <div class="col-md-9">
                        {{ $shipment->customer->name }}
                    </div>
                </div>

                <div class="row" style="margin-top:20px;">
                    <div class="col-md-2">
                        {{ Form::label('container_id', 'Container ID:', ['class' => 'form-spacing-top']) }}
                    </div>
                    <div class="col-md-1" style="margin-top: 8px;">
                        <p>{{ $shipment->container_id }}</p>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px;">
                        <strong><a href="{{ route('container.edit', $shipment->container_id) }}">Go Edit</a></strong>
                    </div>
                </div>

                {{ Form::label('type', 'Shipment Type:', ['class' => 'form-spacing-top required']) }}
                <div class="row">
                    <div class="col-md-4">
                        {{ Form::select('type', ['Outbound' => 'Outbound',
                                          'Inbound' => 'Inbound',
                                          'Transhipment' => 'Transhipment'
                                         ], null, ['class' => 'form-control', 'style' => 'width: 200px;', 'onchange' => "change(this)"]) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::label('auto_label', '', ['id' => 'auto_label', 'class' => 'form-spacing-top', 'style' => 'display:none;']) }}
                    </div>
                </div>

                {{ Form::label('source_id', 'Source:', ['class' => 'form-spacing-top required']) }}
                <select class="form-control" name="source_id" style="width:300px;" required>
                    @foreach($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('destination_id', 'Destination:', ['class' => 'form-spacing-top required']) }}
                <select class="form-control" name="destination_id" style="width:300px;" required>
                    @foreach($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('shipping_date', 'Shipping Date:', ['class' => 'required', 'style' => 'margin-top:20px;']) }}
                {{ Form::text('shipping_date', $shipment->shipping_date, array('class' => 'datepicker', 'style' => 'margin-left:30px;margin-top:20px;')) }}

                {{ Form::label('arrival_date', 'Arrival Date:', ['class' => 'required', 'style' => 'margin-left:70px;margin-top:20px;']) }}
                {{ Form::text('arrival_date', $shipment->arrival_date, array('class' => 'datepicker', 'style' => 'margin-left:30px;margin-top:20px;')) }}

                {{ Form::label('status', 'Status:', ['class' => 'form-spacing-top required']) }}
                {{ Form::select('status', ['Pending' => 'Pending',
                                          'Delivering' => 'Delivering',
                                          'Cancelled' => 'Cancelled',
                                          'Delivered' => 'Delivered'
                                         ], null, ['class' => 'form-control', 'style' => 'width: 200px;']) }}

                <div class="row" style="margin-top:30px;">
                    <div class="col-md-6">
                        <a href="{{ route('shipment.index') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit Shipment
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $( ".datepicker" ).datepicker();
        });

        function change(obj) {
            var selectBox = obj;
            var selected = selectBox.options[selectBox.selectedIndex].value;
            var label = document.getElementById("auto_label");

            if(selected === 'Outbound'){
                label.textContent = 'Auto found individual haulier vehicles: Train 101';
                label.style.display = "block";
            }
            else if(selected === 'Inbound'){
                label.textContent = 'Auto allocate to available warehouse: Warehouse Japan 1-10';
                label.style.display = "block";
            }
            else{
                label.style.display = "none";
            }
        }
    </script>
@endsection