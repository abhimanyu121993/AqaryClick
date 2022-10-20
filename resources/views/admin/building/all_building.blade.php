@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Buildings'])
@section('title', 'Manage Buildings')
@section('main-content')

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Building</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col"> Building No</th>
                                <th scope="col"> Building Code</th>
                                <th scope="col"> Building Type</th>
                                <th scope="col">Building Name</th>
                                <th scope="col">Building Cost</th>
                                <th scope="col">Construction Date</th>
                                <th scope="col">Person Incharge</th>
                                <th scope="col">Person Job</th>
                                <th scope="col">Person Mobile</th>
                                <th scope="col">Country</th>
                                <th scope="col">City</th>
                                <th scope="col">Area</th>
                                <th scope="col">Pincode</th>

                                <th scope="col">Building Receiving Date</th>
                                <th scope="col">Owner Name</th>
                                <th scope="col">Lessor's Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Document</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buildings as $building)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $building->building_no}}</td>
                                    <td>{{ $building->building_code}}</td>
                                    <td>{{ $building->building_type}}</td>
                                    <td>{{ $building->name}}</td>
                                    <td>{{ $building->cost_building}}</td>
                                    <td>{{ $building->Construction_date}}</td>
                                    <td>{{ $building->person_incharge}}</td>
                                    <td>{{ $building->person_job}}</td>
                                    <td>{{ $building->person_mobile}}</td>
                                    <td>{{ $building->country}}</td>
                                    <td>{{ $building->city}}</td>
                                    <td>{{ $building->area}}</td>
                                    <td>{{ $building->pincode}}</td>



                                    <td>{{ $building->building_receive_date}}</td>
                                    <td>{{ $building->owner_name}}</td>
                                    <td>{{ $building->lessor_name}}</td>
                                    <td><img src="{{asset('upload/building/'.$building->building_pic)}}" class="me-75 bg-light-danger" style="height:35px;width:35px;"/></td>
                                    <td>
                                    @php $bid=Crypt::encrypt($building->id); @endphp
                                            <a href="{{route('admin.document',$bid)}}">view</a></td>           
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($building->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('admin.register_building.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.register_building.destroy', $bid) }}"
                                                    method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
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
