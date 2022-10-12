@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Customer'])
@section('title', 'Register Customer')
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
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Address</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script-area')
@endsection
