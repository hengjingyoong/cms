@extends('layouts.app')

@section('title', '| Edit Warehouse')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit Warehouse</h1>
                <hr>
                {!! Form::model($warehouse,['route' => ['warehouse.update', $warehouse->id], 'method' => 'PUT']) !!}
                {{ Form::label('name', 'Warehouse Name:', ['class' => 'form-spacing-top required']) }}
                {{ Form::text('name', null, [
                    'class'         => 'form-control',
                    'required'      => '',
                    'minlength'     => '8',
                    'maxlength'     => '100'
                ]) }}

                {{ Form::label('location', 'Location:', ['class' => 'form-spacing-top required']) }}
                {{ Form::select('location', ['Afghanistan' => 'Afghanistan',
                                          'Albania' => 'Albania',
                                          'Algeria' => 'Algeria',
                                          'Argentina' => 'Argentina',
                                          'Australia' => 'Australia',
                                          'Bangladesh' => 'Bangladesh',
                                          'Bhutan' => 'Bhutan',
                                          'Brazil' => 'Brazil',
                                          'Cambodia' => 'Cambodia',
                                          'Canada' => 'Canada',
                                          'China' => 'China',
                                          'Denmark' => 'Denmark',
                                          'France' => 'France',
                                          'Germany' => 'Germany',
                                          'Iceland' => 'Iceland',
                                          'India' => 'India',
                                          'Italy' => 'Italy',
                                          'Japan' => 'Japan',
                                          'Malaysia' => 'Malaysia',
                                          'Mexico' => 'Mexico',
                                          'Korea' => 'Korea',
                                          'Portugal' => 'Portugal',
                                          'Singapore' => 'Singapore',
                                          'USA' => 'USA',
                                          'Vietnam' => 'Vietnam'
                                         ], null, ['class' => 'form-control', 'style' => 'width: 200px;']) }}

                {{ Form::label('capacity', 'Capacity (m3):', ['class' => 'form-spacing-top required']) }}
                {{ Form::text('capacity', null, [
                    'class'         => 'form-control',
                    'required'      => ''
                ]) }}

                <div class="row" style="margin-top:30px;">
                    <div class="col-md-6">
                        <a href="{{ route('warehouse.index') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit Warehouse
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection