@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Customers'])
@section('title', 'Manage Customers')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Customer's</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Company</th>
                                <th scope="col">Bank Accounts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $usr)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $usr->name }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td>{{ $usr->phone}}</td>
                                    <td>
                        {{-- <a href="{{ route('admin.customer.show',$usr->id) }}">View Company</a> --}}

                                    </td>
                                    <td>
                                        <a href="{{ ('admin.customer.show'.$usr->id) }}">Show Account's</a>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection
