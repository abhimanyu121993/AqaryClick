@extends('admin.includes.layout', ['breadcrumb_title' => 'Electricity'])
@section('title', 'Electricity')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($electricity)? 'Update electricity' : 'Create Electricity' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($electricity) ? route('admin.electricity.update', $electricity->id) : route('admin.electricity.store') }}" method="POST" enctype="multipart/form-data">
                            @if (isset($electricity))
                            @method('patch')
                        @endif
                            @csrf
                            @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                            <div class="row gy-4">
                            <div class="col-xxl-3 col-md-4">
                    <label class="form-label" for="flag">Building Name</label>

                    <select class="select2 form-select" id="building_name" name='building_name'>
                        @if (isset($electricity))
                        <option value="{{ $electricity->id}}" selected>{{ $electricity->building_name}}</option>
                        @else
                        <option value="">--Select Builidng Name--</option>
                        @foreach($build as $building)
                        <option value="{{ $building->id}}">{{ $building->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                            <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Unit No</label>
                            <select class="select2 form-select"  id="{{!isset($electricity)? 'unit_no': '' }}" name='unit_no'>
                            @if (isset($electricity))
                           <option value="{{ $electricity->unit_no }}" selected>{{ $electricity->unit_no}}</option>
                           @else
                           <option value="">--Select Unit No--</option>  
                             @endif
                              </select>
                                </div>

                                <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Unit Type</label>
                            <select class="select2 form-select" id="{{!isset($electricity)? 'unit_type': '' }}" name='unit_type'>
                            @if (isset($electricity))
                           <option value="{{ $electricity->unit_type }}" selected>{{ $electricity->unit_type}}</option>
                           @else
                           <option value="">--Select Unit Type--</option>  
                             @endif
                              </select>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Electricity Account Under</label>
                                    <select class="select2 form-select" id="electric_under" name='electric_under'>
                            @if (isset($electricity))
                           <option value="{{ $electricity->electric_under }}" selected>{{ $electricity->electric_under}}</option>
                           @else
                           <option value="">--Select Electricity Under--</option>  
                           <option value="tenant">Tenant</option>
                                    <option value="lessor">Lessor</option>
                             @endif
                              </select>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Name</label>
                            <select class="select2 form-select" id="{{!isset($electricity)? 'name': '' }}" name='name'>
                            @if (isset($electricity))
                           <option value="{{ $electricity->name }}" selected>{{ $electricity->name}}</option>
                           @else
                           <option value="">--Select Name--</option>  
                             @endif
                              </select>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">QID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="qid_no" name="qid_no" value="{{isset($electricity)? $electricity->qid_no: '' }}" placeholder="Enter Qid No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Register Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="reg_mobile" name="reg_mobile" value="{{isset($electricity)? $electricity->reg_mobile: '' }}" placeholder="Enter Mobile No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Electric No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="electric_no" name="electric_no" value="{{isset($electricity)? $electricity->electric_no: '' }}" placeholder="Enter Electric No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Water No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="water_no" name="water_no" value="{{isset($electricity)? $electricity->water_no: '' }}" placeholder="Enter Water No">
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Last Paid Invoice date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="last_payment" name="last_payment" value="No Records" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Bill Ammount</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="bill_amt" name="bill_amt" value="{{isset($electricity)? $electricity->bill_amt: '' }}" placeholder="Enter Ammount">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Paid By</label>
                                    <select class="select2 form-select" id="paid_by" name='paid_by'>
                            @if (isset($electricity))
                           <option value="{{ $electricity->paid_by }}" selected>{{ $electricity->paid_by}}</option>
                           @else
                           <option value="">--Select--</option>  
                           <option value="tenant">Tenant</option>
                                    <option value="lessor">Lessor</option>
                             @endif
                              </select>
                                </div>
                            </div>
                           
                                <div class="row gy-4">
                            <div class="col-xxl-3 col-md-12">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea class="form-control" name="remark">
                                {{isset($electricity)? $electricity->remark: '' }}
                                    </textarea>
                            </div>
                            </div>
                            <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-12">
                                <label for="building_file" class="form-label">Attachment</label>
                                <div class="input-group">
                                    <input type="file" class="form-control"  id="attachment" name="attachment[]" multiple>
                                </div>
                            </div>
                        </div>
                            <div class="row gy-4 mt-2">
                                <div class="col-xxl-3 col-md-6">
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="submit">{{isset($electricity) ? 'Update' : 'Submit'}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                <th scope="col">Bill Ammount</th>
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
<script>
    $(document).ready(function() {
        $("#building_name").change(function() {
            $(this).find("option:selected").each(function() {
                $("#last_invoice_date").val('No Records');

                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetchunit') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#unit_no").html(p.html);
                        $("#unit_type").html(p.html1);
                        $("#last_invoice_date").val(p.result)
                       


                    }
                });
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $("#electric_under").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if(optionValue=='tenant'){
                var newurl = "{{ url('/admin/fetch-tenant-name')}}";
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#name").html(p);
                    }
                });
            }
            else if(optionValue=='lessor'){
                var newurl = "{{ url('/admin/fetchContract') }}";
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#name").html(p);
                    }
                });
            }
            else{

            }
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $("#name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-qid') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#qid_no").val(p.qid_document);

                    }
                });
            });
        }).change();
    });
</script>
@endsection
