@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Electricity'])
@section('title', 'Manage Electricity')
@section('main-content')

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Electricity</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Building Name</th>
                                <th scope="col">Unit No</th>
                                <th scope="col">Unit Type</th>
                                <th scope="col">Electricity Under</th>
                                <th scope="col">Name</th>
                                <th scope="col">Electric No</th>
                                <th scope="col">Water No</th>
                                <th scope="col">Bill Amount</th>
                                <th scope="col">Privious Payment</th>
                                <th scope="col">Paid By</th>
                                <th scope="col">Remark</th>
                                <th scope="col">View</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($electric as $el)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>                                    
                                    <td>{{ $el->building_name ?? '' }}</td>
                                    <td>{{ $el->unit_no ?? '' }}</td>
                                    <td>{{ $el->unit_type ?? '' }}</td>
                                    <td>{{ $el->electric_under ?? '' }}</td>
                                    <td>{{ $el->name ?? '' }}</td>
                                    <td>{{ $el->electric_no ?? '' }}</td>
                                    <td>{{ $el->water_no ?? '' }}</td>
                                    <td>{{ $el->bill_amt ?? '' }}</td>
                                    <td>{{ $el->last_payment ?? '' }}</td>
                                    <td>{{ $el->paid_by ??''}}</td>
                                    <td>{{ $el->remark ??''}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-eye-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($el->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            @php $pics=json_decode($el->file); @endphp
                                            @foreach ($pics as $pic) 
                                                <li><a class="dropdown-item" href="{{route('admin.getDownload',$pic)}}">{{$pic??''}}</a></li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($el->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('admin.electricity.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.electricity.destroy', $bid) }}"
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
