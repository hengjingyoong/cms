@extends('layouts.app')

@section('title', '| Containers')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>Containers</h1>
            </div>

            <div class="col-md-3">
                <a href="{{ route('container.create') }}" class="btn btn-lg btn-success btn-block" style="margin-top:18px;"><i class="fa fa-plus" aria-hidden="true"></i> Create New Container</a>
            </div>
        </div>
        <hr>

        @if(count($containers) == 0)
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
                            <th class="col-md-2">Customer Name</th>
                            <th class="col-md-2">Container Volume (m3)</th>
                            <th class="col-md-2">Container Weight (kg)</th>
                            <th class="col-md-2">Shipment ID</th>
                            <th class="col-md-4"></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($containers as $container)
                            <tr>
                                <td>{{ $container->customer->name }}</td>
                                <td>{{ $container->volume }}</td>
                                <td>{{ $container->weight }}</td>
                                <td>{{ $container->shipment->id }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ route('container.show', $container->id) }}" class="btn btn-info btn-sm btn-block"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('container.edit', $container->id) }}" class="btn btn-primary btn-sm btn-block"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['container.destroy', $container->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
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
                        {!! $containers->links() !!}
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
            var result = confirm("Are you sure you want to delete the container?");
            return result ? true : false;
        }
    </script>
@endsection
