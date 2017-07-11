@extends('layouts.app')

@section('title', '| Customers')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>Customers</h1>
            </div>

            <div class="col-md-3">
                <a href="{{ route('customer.create') }}" class="btn btn-lg btn-success btn-block" style="margin-top:18px;"><i class="fa fa-plus" aria-hidden="true"></i> Create New Customer</a>
            </div>
        </div>
        <hr>

        @if(count($customers) == 0)
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
                            <th class="col-md-3">Customer Name</th>
                            <th class="col-md-3">Company Name</th>
                            <th class="col-md-2">Location</th>
                            <th class="col-md-3"></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <th>{{ $customer->id }}</th>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->company }}</td>
                                <td>{{ $customer->location }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-primary btn-sm btn-block"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $customer->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
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
                        {!! $customers->links() !!}
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
            var result = confirm("Are you sure you want to delete the customer?");
            return result ? true : false;
        }
    </script>
@endsection
