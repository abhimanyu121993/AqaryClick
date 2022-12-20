@extends('admin.includes.layout', ['breadcrumb_title' => 'New Report'])
<style>
    #card-header{
       background:#c8f4f6;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
   }
   #pop{
       color: black !important;
   }
   #header1
   {
       background: #ecf0f3;
       border: none !important;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
       box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
   }
   #h1
   {
       color: black;
   }
   #example
   {
       font-size: 14px;
   }
   thead
    {
        background:#c9e6e7 !important;
    }
   input ,select,textarea ,#building_type{
       border-radius: 10px !important;
       border: none !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset !important;
   }
   .dataTables_info,.dataTables_paginate {
       font-weight: bolder;
   }
   #btn-btn
   {
       background:#ffffff;
       color: black;
       border: none;
       border-radius: 10px !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;}
   #btn-btn:hover
   { box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;}
</style>
@section('title', 'New Report')
@section('main-content')


<!-- Grids in modals -->
@endsection





@section('script-area')
<script>
    $(document).ready(function() {
        $("#building_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-building-tenant-unit') }}/" + optionValue;
                var newurl2 = "{{url('/admin/fetch-unit-by-building')}}/" + optionValue;

                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#tenant_name").html(p);
                    }
                });
                $.ajax({
                    url: newurl2,
                    method: 'get',
                    success: function(a) {
                        $('#unit_type').html(a);
                    }
                });
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('change', '#filter', function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'All') {
                    $('.document_file').show()
                    $('.contract_file').show();
                    $('.invoice_file').show();
                } else if (optionValue == 'File') {
                    $('.document_file').show()
                    $('.contract_file').hide();
                    $('.invoice_file').hide();
                } else if (optionValue == 'Invoice') {
                    $('.invoice_file').show();
                    $('.contract_file').hide();
                    $('.document_file').hide();
                } else if (optionValue == 'Contract Reciept') {
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

<script>
    $(document).ready(function() {
        $('#GOVERNMENT').show();
        $('#COMPANY').show();
        $('#PERSONAL').show();
        $("#tenant_status").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'ALL') {
                    $('#GOVERNMENT').show();
                    $('#COMPANY').show();
                    $('#PERSONAL').show();
                } else if (optionValue == 'TP') {
                    $('#PERSONAL').show();
                    $('#GOVERNMENT').hide();
                    $('#COMPANY').hide();
                } else if (optionValue == 'TC') {
                    $('#COMPANY').show();
                    $('#GOVERNMENT').hide();
                    $('#PERSONAL').hide();
                } else if (optionValue == 'TG') {
                    $('#GOVERNMENT').show();
                    $('#COMPANY').hide();
                    $('#PERSONAL').hide();

                }
            });
        }).change();
    });
</script>
@endsection