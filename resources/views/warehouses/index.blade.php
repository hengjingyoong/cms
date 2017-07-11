@extends('layouts.app')

@section('title', '| Warehouses')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>Warehouses</h1>
            </div>

            <div class="col-md-3">
                <a href="{{ route('warehouse.create') }}" class="btn btn-lg btn-success btn-block" style="margin-top:18px;"><i class="fa fa-plus" aria-hidden="true"></i> Create New Warehouse</a>
            </div>
        </div>
        <hr>

        @if(count($warehouses) == 0)
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
                            <th class="col-md-1">ID</th>
                            <th class="col-md-3">Warehouse Name</th>
                            <th class="col-md-3">Location</th>
                            <th class="col-md-2">Capacity (m3)</th>
                            <th class="col-md-3"></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($warehouses as $warehouse)
                            <tr>
                                <th>{{ $warehouse->id }}</th>
                                <td>{{ $warehouse->name }}</td>
                                <td>{{ $warehouse->location }}</td>
                                <td>{{ $warehouse->capacity }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('warehouse.edit', $warehouse->id) }}" class="btn btn-primary btn-sm btn-block"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['warehouse.destroy', $warehouse->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block')) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        {!! $warehouses->links() !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        function ConfirmDelete()
        {
            var result = confirm("Are you sure you want to delete the warehouse?");
            return result ? true : false;
        }
    </script>
@endsection
