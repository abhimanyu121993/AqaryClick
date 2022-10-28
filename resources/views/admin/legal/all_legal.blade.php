@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Legal'])
@section('title', 'Manage Legal')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Legal</h4>
                </div><!-- end card header -->
                <div class="card-body  table-responsive">
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
                            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>abc</td>
                                    <td>email</td>
                                    <td>phone</td>
                                    <td>
                                        Show Company
                                    </td>
                                    <td>
                                        Show Account's
                                    </td>
                           
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
