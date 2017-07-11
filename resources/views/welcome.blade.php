@extends('layouts.app')

@section('title', '| Home Page')

@section('content')
<div style="background-image:url('{{ asset('pictures/welcome.jpg') }}');background-repeat: no-repeat;background-size: cover;height:410px;margin-top: -25px;"></div>
<div class="container">
    <div class="row">
        <h2 class="text-center"><strong>Maersk Line</strong></h2>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="col-md-10 col-md-offset-1 well">
                <div class="text-center">
                    <i class="fa fa-clock-o fa-4x" aria-hidden="true"></i>
                </div>

                <h4 class="text-center"><strong>Corporate Background</strong></h4>
                <hr>
                <p class="text-justify" style="font-family:serif; font-size: 18px;">
                    Maersk Line is the global container division and the largest operating unit of the A.P. Moller – Maersk Group,
                    a Danish business conglomerate. It is the world's largest container shipping company having customers through
                    374 offices in 116 countries. It employs approximately 7,000 sea farers and approximately 25,000 land-based people.
                    Maersk Line operates over 600 vessels and has a capacity of 2.6 million TEU. The company was founded in 1928.
                </p><br>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-10 col-md-offset-1 well">
                <div class="text-center">
                    <i class="fa fa-cogs fa-4x" aria-hidden="true"></i>
                </div>

                <h4 class="text-center"><strong>CMS Functionalities</strong></h4>
                <hr>
                <p class="text-justify" style="font-family:serif; font-size: 18px;">
                    CMS will provide tenant web solution that can perform:
                <ul style="font-family:serif; font-size: 18px;">
                    <li>CRUD (Create, Read, Update, Delete) operations for container, warehouse, shipment and customer</li>
                    <li>Automated allocating of inbound containers to warehouses and plan outbound containers to individual haulier vehicles</li>
                    <li>Failover management</li>
                    <li>Import, export and transhipment processing to gate operations</li>
                </ul>
                </p><br>
            </div>
        </div>
    </div>
</div>
@endsection