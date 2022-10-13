@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Owners'])
@section('title', 'Manage Owners')
@section('main-content')
{{ $useraccount }}

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
                            <th scope="col">Bank Name</th>
                            <th scope="col">Account Number</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <th scope="row"></th>
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
