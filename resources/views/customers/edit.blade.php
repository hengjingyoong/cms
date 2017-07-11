@extends('layouts.app')

@section('title', '| Edit Customer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit Customer</h1>
                <hr>
                {!! Form::model($customer,['route' => ['customer.update', $customer->id], 'method' => 'PUT']) !!}
                {{ Form::label('name', 'Customer Name:', ['class' => 'form-spacing-top required']) }}
                {{ Form::text('name', null, [
                    'class'         => 'form-control',
                    'required'      => '',
                    'minlength'     => '5',
                    'maxlength'     => '100'
                ]) }}

                {{ Form::label('company', 'Company Name:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('company', null, [
                    'class'         => 'form-control',
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

                <div class="row" style="margin-top:30px;">
                    <div class="col-md-6">
                        <a href="{{ route('customer.index') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit Customer
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection