@extends('admin.includes.layout', ['breadcrumb_title' => 'Legal Report'])
@section('title', 'Legal Report')
@section('main-content')

<div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Tenant Details</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <p id="msg" class="text-danger"></p>
                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">Building Name</label>
                                <select class="select2 form-select js-example-basic-single" id="building_name"
                                    name='building_name'>
                                    <option value="" selected hidden disabled>--Select Building--</option>
                                    <option value="all">All</option>
                                    @foreach ($building as $build)
                                        <option value="{{ $build->id }}">{{ $build->name }}</option>
                                    @endforeach
                                  
                                </select>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">Tenant Name</label>
                                <select class="select2 form-select js-example-basic-single" id="tenant_name"
                                    name='tenant_name'>
                                    <option value="" selected hidden disabled>--Select Tenant--</option>
                                   
                                </select>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">Tenant Contract</label>
                                <select class="select2 form-select js-example-basic-single" id="tenant_contract"
                                    name='tenant_contract'>
                                    <option value="" selected hidden disabled>--Select Contract--</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container" id="legal_content"style="display: none;">
    <div class="card alert alert-danger alert-dismissible" id="contract_in_legal">

    </div>
</div>

    <!-- Grids in modals -->
@endsection


@section('script-area')
<script>
        $(document).ready(function() {
            $("#building_name").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetch-building-tenant') }}/" + optionValue;
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
            $("#tenant_name").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var name = $(this).text();
                    $('#tenantName').val(name);
                    $('.tenant_id').val(optionValue);
                    var newurl = "{{ url('/admin/fetch-legal-contract-details') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            $("#tenant_contract").html(p);
                        }
                    });
                });
            }).change();
        });
    </script>

<script>
        $(document).ready(function() {
            $("#tenant_contract").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    $('.cid').val(optionValue);
                    $('#due-payment-details').val(optionValue);
                    $('#full-payment-details').val(optionValue);

                    var newurl = "{{ url('/admin/legal-contract-details') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            console.log(p);
                            
                            $('#legal_content').show();

                            $('#contract_in_legal').text(p);
                        }
                    });
                });
            }).change();
        });
    </script>
@endsection
