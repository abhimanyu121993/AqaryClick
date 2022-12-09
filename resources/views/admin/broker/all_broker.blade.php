@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Broker'])
@section('title', 'Manage Broker')
@section('main-content')

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex table-main-heading">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Broker</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead class="thead-color">
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email</th>
                                <th scope="col">Unit Ref</th>
                                <th scope="col">Buildings</th>
                                <th scope="col">Total Tenant</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>                           
                                 @foreach ($units as $unit)                   
                                    <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $unit->broker_name??''}}</td>
                                    <td>{{ $unit->mobile??''}}</td>
                                    <td>{{ $unit->email??''}}</td>
                                    <td>{{ $unit->unitdetails->unit_ref??'' }}</td>
                                    <td>{{ $unit->buildingdetails->name??'' }}</td>

                                    <td></td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($unit->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('admin.broker.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.broker.destroy', $bid) }}"
                                                    method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                            
                            </tr>
                            @endforeach
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
