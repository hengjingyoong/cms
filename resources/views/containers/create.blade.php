@extends('layouts.app')

@section('title', '| Create New Container')

@section('stylesheets')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Container</h1>
            <hr>
            {!! Form::open(['route' => 'container.store']) !!}
            {{ Form::label('customer_id', 'Customer:', ['class' => 'required', 'style' => 'margin-top:20px;']) }}
            <div class="row">
                <div class="col-md-8">
                    <select class="form-control" name="customer_id" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4" style="margin-top: 8px;">
                    <strong><a href="{{ route('customer.create') }}">Create New</a></strong>
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

            {{ Form::label('type', 'Shipment Type:', ['class' => 'form-spacing-top required']) }}
            <div class="row">
                <div class="col-md-4">
                    {{ Form::select('type', ['Outbound' => 'Outbound',
                                      'Inbound' => 'Inbound',
                                      'Transhipment' => 'Transhipment'
                                     ], 'Transhipment', ['class' => 'form-control', 'style' => 'width: 200px;', 'onchange' => "change(this)"]) }}
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
            {{ Form::text('shipping_date', '', array('class' => 'datepicker', 'style' => 'margin-left:30px;margin-top:20px;')) }}

            {{ Form::label('arrival_date', 'Arrival Date:', ['class' => 'required', 'style' => 'margin-left:70px;margin-top:20px;']) }}
            {{ Form::text('arrival_date', '', array('class' => 'datepicker', 'style' => 'margin-left:30px;margin-top:20px;')) }}

            <div class="row" style="margin-top:30px;">
                <div class="col-md-6">
                    <a href="{{ route('container.index') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create Container
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