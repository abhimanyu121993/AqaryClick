@extends('admin.includes.layout', ['breadcrumb_title' => 'Report'])
@section('title', 'Report')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Tenant Report</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="" method="POST">
                            @csrf
                            <div class="row gy-4">
                            <div class="col-md-4 mb-1">
                            <label class="form-label" for="flag">Building Name</label>
                            <select class="select2 form-select js-example-basic-single" id="building_name" name='building_name'>
                                <option value="" selected hidden disabled>--Select Building--</option>
                                <option value="all">All</option>
                                @foreach($building as $build)
                                <option value="{{ $build->id}}">{{ $build->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="flag">Tenant Name</label>
                            <select class="select2 form-select js-example-basic-single" id="tenant_name" name='tenant_name'>
                                <option value="" selected hidden disabled>--Select Tenant--</option>
                            </select>
                        </div>
                        <div class="col-xxl-4 col-md-3">
                                <label for="name" class="form-label">Filter</label>
                                <select class="select2 form-select js-example-basic-single" id="filter" name="filter">
                                    <option value="" selected hidden>--Select Status--</option>
                                    <option value="All">All</option>
                                    <option value="File">File</option>
                                    <!-- <option value="Document">Document</option> -->
                                    <option value="Contract Reciept">Contract Reciept</option>
                                    <option value="Invoice">Invoice</option>
                                    <!-- <option value="Receipt Vouchure">Receipt Vouchure</option> -->
                                </select>
                            </div>                       
                                <!--end col-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container tenant_all_data">

    </div>



    <!-- Grids in modals -->
@endsection


@section('script-area')
<script>
    $(document).ready(function() {
        $("#building_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-building-tenant-unit') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#tenant_name").html(p);
                    }
                });
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('change','#filter',function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if(optionValue=='All'){
                    $('.document_file').show()
                    $('.contract_file').show();
                    $('.invoice_file').show();
                }
                else if(optionValue=='File'){
                    $('.document_file').show()
                    $('.contract_file').hide();
                    $('.invoice_file').hide();
                }
                else if(optionValue=='Invoice'){
                    $('.invoice_file').show();
                    $('.contract_file').hide();
                    $('.document_file').hide();
                }
                else if(optionValue=='Contract Reciept') {
                    $('.contract_file').show();
                    $('.invoice_file').hide();
                    $('.document_file').hide();
                }
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $("#tenant_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/master-report') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $('.tenant_all_data').html(p);
            }
                });
            });
        }).change();
    });
</script>
@endsection
