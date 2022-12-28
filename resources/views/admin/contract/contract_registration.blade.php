@extends('admin.includes.layout', ['breadcrumb_title' => 'Contract'])
@section('title', 'Contract')
<style>
    #card-header {
        background: #c8f4f6;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    #pop {
        color: black !important;
    }

    #header1 {
        background: #ecf0f3;
        border: none !important;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
    }

    #h1 {
        color: black;
    }

    #example {
        font-size: 14px;
    }

    thead {
        background: #c9e6e7 !important;
    }

    input,
    select,
    textarea,
    #building_type {
        border-radius: 10px !important;
        border: none !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset !important;
    }

    .dataTables_info,
    .dataTables_paginate {
        font-weight: bolder;
    }

    #btn-btn {
        background: #ffffff;
        color: black;
        border: none;
        border-radius: 10px !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;
    }

    #btn-btn:hover {
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;
    }
</style>
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">
                        {{ isset($contractedit) ? 'Update Contract' : 'Contract Register' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form
                            action="{{ isset($contractedit) ? route('admin.contract.update', $contractedit->id) : route('admin.contract.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @if (isset($contractedit))
                                @method('patch')
                            @endif
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row gy-4">

                                <div class="col-xxl-3 col-md-3">
                                    <label for="space" class="form-label">Tenant Type</label>
                                    <select class="form-control" id="tenant_type" name="tenant_type">
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->tenantDetails->tenant_type }}" selected hidden>
                                                {{ $contractedit->tenantDetails->tenant_type == 'TP' ? 'Personal' : ($contractedit->tenantDetails->tenant_type == 'TC' ? 'Company' : ($contractedit->tenantDetails->tenant_type == 'TG' ? 'Goverment' : 'N/A')) }}
                                            </option>
                                        @else
                                            <option value="" selected hidden>--Select Tenant Type--</option>
                                        @endif

                                        <option value="TP">Personal</option>
                                        <option value="TC">Company</option>
                                        <option value="TG">Government</option>

                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Tenant Name</label>

                                    <select class="select2 form-select js-example-basic-single" id="tenant_name"
                                        name='tenant_name'>
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->tenant_name }}" selected>
                                                {{ $contractedit->tenantDetails->tenant_english_name }}</option>
                                        @else
                                            <option value="" selected hidden>--Select Tenant--</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Tenant Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tenant_primary_mobile"
                                            name="tenant_mobile"
                                            value="{{ isset($contractedit) ? $contractedit->tenant_mobile : '' }}"
                                            placeholder="Enter tenant mobile " readonly>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Tenant Nationality</label>
                                    <div class="input-group" id="tenantInput">
                                        <input type="text" class="form-control" id="tenant_nationality"
                                            name="tenant_nationality"
                                            value=" {{ isset($contractedit) ? $contractedit->countryDetails->name ?? '' : '' }}"
                                            placeholder="Enter Tenant Nationality " readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="space" class="form-label">Document Type</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="document_type" name="document_type"
                                            value="{{ isset($contractedit) ? $contractedit->document_type : '' }}"
                                            placeholder="Enter Document Type" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 mb-2" id="qid">
                                    <label for="country" class="form-label">ID</label>
                                    <div class="input-group">
                                        <input type="text"
                                            value="{{ isset($contractedit) ? $contractedit->qid_document : '' }}"
                                            id="qid_document" class="form-control" name="qid_document"
                                            placeholder="QID Document Number" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 mb-2" id="cr">
                                    <label for="state" class="form-label">CR</label>
                                    <div class="input-group">
                                        <input type="text" id="cr_document" class="form-control" name="cr_document"
                                            placeholder="Enter CR No" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 mb-2" id="passport">
                                    <label for="country" class="form-label">Passport</label>
                                    <div class="input-group">
                                        <input type="text" id="passport_doc" class="form-control"
                                            name="passport_document" placeholder="Passport Document" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 mb-2" id="establishment">
                                    <label for="country" class="form-label">Establishment Card No</label>
                                    <div class="input-group">
                                        <input type="text" id="establishment_card" class="form-control"
                                            name="established_card_no" placeholder="Establishment Card No" readonly>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3 mb-2" id="government">
                                    <label for="country" class="form-label">Government Housing No</label>
                                    <div class="input-group">
                                        <input type="text" id="government_housing" class="form-control"
                                            name="government_housing_no" placeholder="Government Housing No" readonly>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Contract Status</label>
                                    <select class="form-control select2 form-select" id="contract_status"
                                        name="contract_status">
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->contract_status }}">
                                                {{ $contractedit->contract_status ?? '' }}</option>
                                        @endif
                                        <option value="" {{ isset($contractedit) ? 'hidden' : 'selected' }}>--Select
                                            Status--</option>
                                        <option value="new">New</option>
                                        <option value="renewed">Renewed</option>
                                        <option value="not renewed">Not Renewed</option>
                                        <option value="auto renewed">Auto Renewed</option>
                                        <option value="long term">Long Term</option>
                                        <option value="releted parties">Related Parties</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3 sponsor_hide">
                                    <label for="name" class="form-label">Sponsor Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_name" name="sponsor_name"
                                            value="{{ isset($contractedit) ? $contractedit->sponsor_name : '' }}"
                                            placeholder="Enter sponsor name" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 sponsor_hide">
                                    <label for="name" class="form-label">Sponsor id</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_id" name="sponsor_id"
                                            value="{{ isset($contractedit) ? $contractedit->sponsor_id : '' }}"
                                            placeholder="Enter sponsor id" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 sponsor_hide">
                                    <label for="name" class="form-label">Sponser Nationality</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponer_nationality"
                                            name="sponser_nationality"
                                            value="{{ isset($contractedit) ? $contractedit->nationality : '' }}"
                                            placeholder="Enter Sponser Nationality " readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 sponsor_hide">
                                    <label for="name" class="form-label">Sponsor Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_mobile"
                                            name="sponsor_mobile"
                                            value="{{ isset($contractedit) ? $contractedit->sponsor_mobile : '' }}"
                                            placeholder="Enter sponsor mobile " readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lessor's Name</label>
                                    <select class="select2 form-select js-example-basic-single" id="lessor"
                                        name='lessor'>
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->customer->id }}" selected>
                                                {{ $contractedit->customer->full_name }}</option>
                                        @endif
                                        <option value="" {{ isset($contractedit) ? 'hidden' : 'selected' }}>--Select
                                            Lessor's--</option>
                                        @role('superadmin')
                                            @foreach ($lessor as $less)
                                                <option value="{{ $less->id }}">{{ $less->first_name }}
                                                    {{ $less->last_name }}</option>
                                            @endforeach
                                        @endrole
                                        @role('Owner')
                                            <option value="{{ $lessor->id }}">{{ $lessor->first_name }}
                                                {{ $lessor->last_name }}</option>
                                        @endrole
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Company</label>
                                    <select class="form-control select2 form-select" id="company" name="company_id">
                                        <option value=''>--Select Company--</option>
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->company_id ?? '' }}" selected>
                                                {{ $contractedit->company->business_name ?? '' }}</option>
                                        @else
                                            <option value="" selected hidden>--Select Business--</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Company Authorized Person</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="authorized_person"
                                            name="authorized_person"
                                            value="{{ isset($contractedit) ? $contractedit->authorized_person : '' }}"
                                            placeholder="Authorized Person " readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3" id="hide_sign">
                                    <label for="lessor_sign" class="form-label" id="d-sing">Lessor's Sign</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="lessor_sign" name="lessor_sign">
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Release Date </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="release_date" name="release_date"
                                            value="{{ isset($contractedit) ? \Carbon\Carbon::parse($contractedit->release_date)->format('Y-m-d') : '' }}"
                                            placeholder="Enter Release Date ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lease Start Date </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="lease_start_date"
                                            name="lease_start_date"
                                            value="{{ isset($contractedit) ? \Carbon\Carbon::parse($contractedit->lease_start_date)->format('Y-m-d') : '' }}"
                                            placeholder="Enter Lease Start Date ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lease End Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="lease_end_date"
                                            name="lease_end_date"
                                            value="{{ isset($contractedit) ? \Carbon\Carbon::parse($contractedit->lease_end_date)->format('Y-m-d') : '' }}"
                                            placeholder="Enter Lease End Date">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lease Period Month</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="lease_period_month"
                                            name="lease_period_month"
                                            value="{{ isset($contractedit) ? $contractedit->lease_period_month : '' }}"
                                            placeholder="Enter Lease Period Month" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lease Period Day</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="lease_period_day"
                                            name="lease_period_day"
                                            value="{{ isset($contractedit) ? $contractedit->lease_period_day : '' }}"
                                            placeholder="Enter Lease Period Day" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Grace Period</label>

                                    <select class="select2 form-select" id="grace" name='grace'>
                                        <option value="" {{ isset($contractedit->grace_start_date) ? 'hidden' : 'selected' }}>--Select
                                            grace--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>

                                    </select>
                                </div>

                                <div class="clone_grace  " {{ isset($contractedit) ? '' : 'style="display:none;"' }}>
                                    @if (isset($contractedit))
                                        @php
                                            $pgrace = json_decode($contractedit->grace_start_date);
                                            $graceto = json_decode($contractedit->grace_end_date);
                                            $gracem = json_decode($contractedit->grace_period_month);
                                            $graced = json_decode($contractedit->grace_period_day);
                                        @endphp
                                        @if (is_array($pgrace) and
                                            is_array($graceto) and
                                            is_array($gracem) and
                                            count($pgrace) > 0 and
                                            count($graceto) > 0 and
                                            count($gracem) > 0 and
                                            count($graced) > 0)
                                            @foreach ($pgrace as $k => $pg)
                                                <div class="row pgrace"
                                                    {{ isset($contractedit) ? '' : 'style="display:none;"' }}>
                                                    <div class="col-xxl-3 col-md-3" id="grace_start_date">

                                                        <label for="name" class="form-label">Grace From</label>
                                                        <div class="input-group">
                                                            <input type="date" class="form-control grace_start"
                                                                id="grace_start" name="grace_start_date[]"
                                                                value="{{ isset($pg) ? $pg : '' }}"
                                                                placeholder="dd-mm-yyyy">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-md-3" id="grace_end_date">
                                                        <label for="name" class="form-label">Grace To</label>
                                                        <div class="input-group">
                                                            <input type="date" class="form-control grace_end" id="grace_end"
                                                                name="grace_end_date[]"
                                                                value="{{ isset($pg) ? $graceto[$k] : '' }}"
                                                                placeholder="dd-mm-yyyy">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-md-3" id="grace_period_month">
                                                        <label for="name" class="form-label">Grace Period
                                                            Month</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control grace_month" id="grace_month"
                                                                name="grace_period_month[]"
                                                                value="{{ isset($gracem) ? $gracem[$k] : '' }}"
                                                                placeholder="Grace Period Month" readonly>
                                                        </div>

                                                    </div>
                                                    <div class="col-xxl-3 col-md-3" id="grace_period_day">
                                                        <label for="name" class="form-label">Grace Period Day</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control grace_day" id="grace_day"
                                                                name="grace_period_day[]"
                                                                value="{{ isset($graced) ? $graced[$k] : '' }}"
                                                                placeholder="Enter Grace Period Day" readonly>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        @else
                                            {{-- <h6 class="text-danger">Grace Block Some data are mission ... so this block not
                                                created Or this is import via excel</h6> --}}
                                               @for($i=1;$i<=Carbon\Carbon::parse($contractedit->lease_start_date)->diffInYears(Carbon\Carbon::parse($contractedit->lease_end_date));$i++ )
                                                   
                                              
                                                <div class="row pgrace">
                                                    <div class="col-xxl-3 col-md-3 grace_start_date" id="grace_start_date">

                                                        <label for="name" class="form-label">Grace From</label>
                                                        <div class="input-group">
                                                            <input type="date" class="form-control grace_start"
                                                                id="grace_start" name="grace_start_date[]" value=""
                                                                placeholder="dd-mm-yyyy">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-md-3 grace_end_date" id="grace_end_date">
                                                        <label for="name" class="form-label">Grace To</label>
                                                        <div class="input-group">
                                                            <input type="date" class="form-control grace_end" id="grace_end"
                                                                name="grace_end_date[]" value=""
                                                                placeholder="dd-mm-yyyy">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-md-3 grace_period_month" id="grace_period_month">
                                                        <label for="name" class="form-label">Grace Period Month</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control grace_month" id="grace_month"
                                                                name="grace_period_month[]" value=""
                                                                placeholder="Grace Period Month" readonly>
                                                        </div>

                                                    </div>
                                                    <div class="col-xxl-3 col-md-3 grace_period_day" id="grace_period_day">
                                                        <label for="name" class="form-label">Grace Period Day</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control grace_day" id="grace_day"
                                                                name="grace_period_day[]" value=""
                                                                placeholder="Enter Grace Period Day" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                @endfor
                                             @endif
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Approved By</label>
                                    <select class="select2 form-select js-example-basic-single" id="approved_by"
                                        name='approved_by'>
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->approved_by }}">
                                                {{ $contractedit->customer->full_name }}</option>
                                        @else
                                            <option value="" {{ isset($contractedit) ? 'hidden' : 'selected' }}>--Select
                                                Person--</option>
                                            @role('superadmin')
                                                @foreach ($lessor as $less)
                                                    <option value="{{ $less->id }}">{{ $less->first_name }}
                                                        {{ $less->last_name }}</option>
                                                @endforeach
                                            @endrole
                                            @role('Owner')
                                                <option value="{{ $lessor->id }}">{{ $lessor->first_name }}
                                                    {{ $lessor->last_name }}</option>
                                            @endrole
                                        @endif

                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Attestation Status</label>
                                    <select class="form-control select2 form-select" name="attestation_status"
                                        id="attestation_status">
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->attestation_status }}" selected>
                                                {{ $contractedit->attestation_status }}</option>
                                        @else
                                            <option value="" selected hidden>--Select Status--</option>
                                        @endif
                                        <option value="Done">Done</option>
                                        <option value="Not Yet">Not Yet</option>
                                        <option value="Under Process">Under Process</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3" id="attestation_no">
                                    <label for="name" class="form-label">Attestation No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="attestation_no"
                                            value="{{ isset($contractedit) ? $contractedit->attestation_no : '' }}"
                                            placeholder="Enter Attestation No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3" id="attestation_expiry">
                                    <label for="name" class="form-label">Attestation Expiry</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name"
                                            name="attestation_expiry"
                                            value="{{ isset($contractedit) ? $contractedit->attestation_expiry : '' }}"
                                            placeholder="Enter Attestation Expiry">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Currency</label>
                                    <select class="form-control select2 form-select .currency" name="currency_type"
                                        id="currency">
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->currency }}" selected>
                                                {{ $contractedit->currency }}</option>
                                        @else
                                            <option value="" selected hidden>--Select Currency--</option>
                                        @endif
                                        @foreach ($currency as $c)
                                            <option value="{{ $c->id }}">{{ $c->code ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Rent Amount</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="rent_amount" name="rent_amount"
                                            value="{{ isset($contractedit) ? $contractedit->rent_amount : '' }}"
                                            placeholder="Enter Rent Amount">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Total Invoice</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="total_invoice"
                                            name="total_invoice"
                                            value="{{ isset($contractedit) ? $contractedit->total_invoice : '' }}"
                                            placeholder="Total Invoice" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Guarantees</label>
                                    <select class="form-control select2 form-select" id="guarantees" name="guarantees">
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->Guarantees }}" selected>
                                                {{ $contractedit->Guarantees }}</option>
                                        @else
                                            <option value="" selected hidden>--Select Guarantees--</option>
                                        @endif
                                        <option value="Available">Available</option>
                                        <option value="Not Available">Not Available</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3" id="guarantees_pay">
                                    <label for="name" class="form-label">Payment Mode</label>
                                    <select class="form-control select2 form-select" name="guarantees_payment_method">
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->guarantees_payment_method }}" selected>
                                                {{ $contractedit->guarantees_payment_method }}</option>
                                        @else
                                            <option value="" selected hidden>--Select Option--</option>
                                        @endif
                                        <option value="Cheque">Cheque</option>
                                        <option value="Cash">Cash</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Contract Type</label>
                                    <select class="form-control select2 form-select" id="contract_type"
                                        name="contract_type">
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->contract_type }}" selected>
                                                {{ $contractedit->contract_type }}</option>
                                        @else
                                            <option value="" selected hidden>--Select Contract--</option>
                                        @endif
                                        <option value="Internal">Internal</option>
                                        <option value="External">External</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="row gy-4 mt-2">
                        <div class="col-xxl-3 col-md-12">
                            <label for="remark" class="form-label">Remark</label>
                            <textarea class="form-control" name="remark">
                                    {{ isset($contractedit) ? $contractedit->remark : '' }}
                                    </textarea>
                        </div>
                    </div>


                    <div class="row gy-4 mt-2">
                        <div class="col-xxl-3 col-md-3">
                            <div class="input-group">
                                <button class="btn btn-primary" id="btn-btn"
                                    type="submit">{{ isset($contractedit) ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">
                        {{ isset($contractedit) ? 'Update payment' : 'Payment Details' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container table-responsive ">
                        <thead>
                            <tr>
                                <th scope="col">Total Invoice</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Delay Invoice</th>
                                <th scope="col">Total Delay Amount</th>
                                <th scope="col">Invoices Balance</th>
                                <th scope="col">Total Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ App\Models\Invoice::count() }}</td>
                                <td>{{ $total_amt ?? 0 }}</td>
                                <td>{{ App\Models\Invoice::whereNotNull('overdue_period')->count() }}</td>
                                <td>{{ $total_delay ?? 0 }}</td>
                                <td>{{ $invoice_balance ?? 0 }}</td>
                                <td>{{ $total_balance ?? 0 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body field_wrapper -responsive">
                    <table id="example"
                        class="display table table-bordered dt-responsive dataTable dtr-inline table-hover"
                        style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Payment Date</th>
                                <th scope="col">Due Amount</th>

                                <!-- <th scope="col">Total Contract</th> -->
                                <!-- <th scope="col">Amount Paid</th> -->
                                <th scope="col">Payment Status</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Overdue Period </th>
                                <th scope="col">Remark</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoiceDetails as $inv)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $inv->invoice_no ?? '' }}</td>
                                    <td>{{ Carbon\Carbon::parse($inv->due_date)->format('d-m-Y') ?? '' }}</td>
                                    <td>{{ Carbon\Carbon::parse($inv->created_at)->format('d-m-Y') ?? '' }}</td>
                                    <td>{{ $inv->total_balance ?? '' }}</td>
                                    <!-- <td>{{ $inv->Contract->total_contract ?? '' }}</td> -->
                                    <!-- <td>{{ $inv->amt_paid ?? '' }}</td> -->
                                    <td>{{ $inv->payment_status ?? '' }}</td>
                                    <td>{{ $inv->payment_method ?? '' }}</td>
                                    <td>{{ $inv->overdue_period ?? '' }}Days</td>
                                    <td>{{ $inv->remark ?? '' }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection


@section('script-area')
    <script>
        $(document).ready(function() {
            $('#qid').hide();
            $('#cr').hide();
            $('#passport').hide();
            $('#establishment').hide();
            $('#government').hide();
            $(document).on('change', '#tenant_name', function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetch-tenant-contract-no') }}/" + optionValue;
                    var newurl = "{{ url('/admin/fetchtenant') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            console.log(p);
                            $("#tenant_primary_mobile").val(p.tenant_primary_mobile);
                            $('#tenant_nationality').val(p.tenant_nationality.name);
                            $('#sponsor_name').val(p.sponsor_name);
                            $('#sponsor_id').val(p.sponsor_oid);
                            $('#sponsor_mobile').val(p.sponsor_phone);
                            $('#qid_document').val(p.qid_document);
                            $('#document_type').val(p.tenant_document);
                            $('#cr_document').val(p.cr_document);
                            $('#passport_doc').val(p.passport);
                            $('#establishment_card').val(p.established_card_no);
                            $('#government_housing').val(p.government_housing_no);
                            $('#sponer_nationality').val(p.nationality.name);
                        }
                    });
                    $(document).on('change', "#contract_status", function() {
                        $(this).find("option:selected").each(function() {
                            var StatusValue = $(this).attr("value");
                            if (StatusValue == 'auto renewed') {
                                var leaseurl =
                                    "{{ url('/admin/fetch-contract-lease') }}/" +
                                    optionValue;
                                $.ajax({
                                    url: leaseurl,
                                    method: 'get',
                                    success: function(p) {
                                        $('#rent_amount').val(p.res.rent_amount);
                                        $('#release_date').val(p.res.release_date);
                                        $('#lease_start_date').val(p.res.lease_end_date);
                                        $('#lease_end_date').val(p.date);
                                        $('#lease_period_month').val(p.diff_in_months);
                                        $('#total_invoice').val(p.diff_in_months);
                                        $('#lease_period_day').val(p.diff_in_Days);
                                        var total_years = p.diff_in_Years;
                                        var gracediv = '';
                                        for (var i = 1; i <=
                                            total_years; i++) {
                                            gracediv += '<div class="row pgrace"><div class="col-xxl-3 col-md-3 grace_start_date">\
                                        <label for="name" class="form-label">Grace From</label>\
                                        <div class="input-group">\
                                            <input type="date" class="form-control grace_start" id="grace_start" name="grace_start_date[]" value="" placeholder="dd-mm-yyyy">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-3 grace_end_date">\
                                        <label for="name" class="form-label">Grace To</label>\
                                        <div class="input-group">\
                                            <input type="date" class="form-control grace_end" id="grace_end" name="grace_end_date[]"value="" placeholder="dd-mm-yyyy">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-3 grace_period_month" >\
                                        <label for="name" class="form-label">Grace Period Month</label>\
                                        <div class="input-group">\
                                            <input type="text" class="form-control grace_month" id="grace_month" name="grace_period_month[]" value="" placeholder="Grace Period Month" readonly>\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-3 grace_period_day">\
                                        <label for="name" class="form-label">Grace Period Day</label>\
                                        <div class="input-group">\
                                            <input type="text" class="form-control grace_day" id="grace_day" name="grace_period_day[]"value="" placeholder="Enter Grace Period Day" readonly>\
                                        </div>\
                                    </div></div>';
                                        }
                                        $('.clone_grace').html(gracediv);
                                    }
                                });
                            } else {
                                $('#release_date').val('');
                                $('#lease_start_date').val('');
                                $('#lease_end_date').val('');
                                $('#lease_period_month').val('');
                                $('#total_invoice').val('');
                                $('#lease_period_day').val('');
                                $('#rent_amount').val('');

                            }
                        });
                    }).change();

                });
            }).change();
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#grace").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'Yes') {
                        $('.clone_grace').show();

                    } else if (optionValue == 'No') {
                        $('.clone_grace').hide();

                    }
                });
            }).change();
        });
    </script>
    <script>
      function gracecal(){
        var date = new Date($('#lease_start_date').val());
            var dayTo = date.getDate();
            var monthTo = date.getMonth() + 1;
            var yearTo = date.getFullYear();
            var dateF = new Date($('#lease_end_date').val());
                var dayFrom = dateF.getDate();
                var monthFrom = dateF.getMonth() + 1;
                var yearFrom = dateF.getFullYear();
                start_date = new Date(yearTo, monthTo, dayTo);
                end_date = new Date(new Date(yearFrom, monthFrom, dayFrom));
                total_months = (end_date.getFullYear() - start_date.getFullYear()) * 12 + (end_date.getMonth() -start_date.getMonth());
                $('#lease_period_month').val(total_months);
                $('#total_invoice').val(total_months);
                var d1 = new Date(date);
                var d2 = new Date(dateF);
                var diff = d2.getTime() - d1.getTime();
                var daydiff = diff / (1000 * 60 * 60 * 24);
                $('#lease_period_day').val(daydiff);

                function diff_years(d2, d1) {

                    var diff = (d2.getTime() - d1.getTime()) / 1000;
                    diff /= (60 * 60 * 24);
                    return Math.abs(Math.round(diff / 365.25));
                }

                var total_years = diff_years(d1, d2);
                var gracediv = '';
                for (var i = 1; i <= total_years; i++) {
                    gracediv += '<div class="row pgrace "><div class="col-xxl-3 col-md-3 grace_start_date">\
                                        <label for="name" class="form-label">Grace From</label>\
                                        <div class="input-group">\
                                            <input type="date" class="form-control grace_start" id="grace_start" name="grace_start_date[]" value="" placeholder="dd-mm-yyyy">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-3 grace_end_date">\
                                        <label for="name" class="form-label">Grace To</label>\
                                        <div class="input-group">\
                                            <input type="date" class="form-control grace_end" id="grace_end" name="grace_end_date[]"value="" placeholder="dd-mm-yyyy">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-3 grace_period_month" >\
                                        <label for="name" class="form-label">Grace Period Month</label>\
                                        <div class="input-group">\
                                            <input type="text" class="form-control grace_month" id="grace_month" name="grace_period_month[]" value="" placeholder="Grace Period Month" readonly>\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-3 grace_period_day">\
                                        <label for="name" class="form-label">Grace Period Day</label>\
                                        <div class="input-group">\
                                            <input type="text" class="form-control grace_day" id="grace_day" name="grace_period_day[]"value="" placeholder="Enter Grace Period Day" readonly>\
                                        </div>\
                                    </div></div>';
                }
                $('.clone_grace').html(gracediv);

          
      }

        $(document).on('change', '#lease_end_date', function() {
            gracecal();
            var st = $('#lease_start_date').val();
            var date = new Date(st);
            var dayTo = date.getDate();
            var monthTo = date.getMonth() + 1;
            var yearTo = date.getFullYear();
            var dateF = new Date($(this).val());
            var dayFrom = dateF.getDate();
            var monthFrom = dateF.getMonth() + 1;
            var yearFrom = dateF.getFullYear();
            start_date = new Date(yearTo, monthTo, dayTo);
            end_date = new Date(new Date(yearFrom, monthFrom, dayFrom));
            total_months = (end_date.getFullYear() - start_date.getFullYear()) * 12 + (end_date.getMonth() - start_date.getMonth())
            $('#lease_period_month').val(total_months);
            $('#total_invoice').val(total_months);
            var d1 = new Date(date);
            var d2 = new Date(dateF);
            var diff = d2.getTime() - d1.getTime();
            var daydiff = diff / (1000 * 60 * 60 * 24);
            $('#lease_period_day').val(daydiff);


        });
    </script>
    <script>
        $(document).on('change', '.grace_start', function() {
            var a = $(this).val();
            var date = new Date($(this).val());
            var dayTo = date.getDate();
            var monthTo = date.getMonth() + 1;
            var yearTo = date.getFullYear();
            $('.grace_end').change(function() {
                var dateF = new Date($(this).val());
                var dayFrom = dateF.getDate();
                var monthFrom = dateF.getMonth() + 1;
                var yearFrom = dateF.getFullYear();
                start_date = new Date(yearTo, monthTo, dayTo);
                end_date = new Date(new Date(yearFrom, monthFrom, dayFrom));
                total_months = (end_date.getFullYear() - start_date.getFullYear()) * 12 + (end_date.getMonth() -start_date.getMonth());
                $(this).closest('.pgrace').children('.grace_period_month').children('.input-group').children('.grace_month').val(total_months);
                var d1 = new Date(date);
                var d2 = new Date(dateF);
                var diff = d2.getTime() - d1.getTime();
                var daydiff = diff / (1000 * 60 * 60 * 24);
                $(this).closest('.pgrace').children('.grace_period_day').children('.input-group').children('.grace_day').val(daydiff);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.sponsor_hide').hide();

        });
        $(document).on('change', "#tenant_type", function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'TC') {
                    $('.sponsor_hide').show();
                    $('#cr').show();
                    $('#establishment').show();
                    $('#passport').hide();
                    $('#qid').hide();



                } else if (optionValue == 'TP') {
                    $('.sponsor_hide').hide();
                    $('#government').hide();
                    $('#cr').hide();
                    $('#establishment').hide();
                    $('#passport').show();
                    $('#qid').show();

                } else if (optionValue == 'TG') {
                    $('.sponsor_hide').hide();
                    $('#government').show();
                    $('#cr').hide();
                    $('#establishment').hide();
                    $('#passport').hide();
                    $('#qid').hide();

                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('change', "#tenant_type", function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetch-tenant-details') }}/" + optionValue;
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
            $("#lessor").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetch-company') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            $("#company").html(p);
                        }
                    });
                });
            }).change();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#hide_sign').hide();
            $("#company").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetch-authorized_person') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            $('#hide_sign').show();
                            $("#authorized_person").val(p.authorized_person);
                            $('#d-sing').text(p.authorized_person + "'s sign")
                        }
                    });
                });
            }).change();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#guarantees_pay').hide();
            $("#guarantees").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'Available') {
                        $('#guarantees_pay').show();
                    } else if (optionValue == 'Not Available') {
                        $('#guarantees_pay').hide();
                    }
                });
            }).change();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#attestation_no').hide();
            $('#attestation_expiry').hide();
            $("#attestation_status").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'Done') {
                        $('#attestation_no').show();
                        $('#attestation_expiry').show();
                    } else if (optionValue == 'Not Yet') {
                        $('#attestation_no').hide();
                        $('#attestation_expiry').hide();
                    } else if (optionValue == 'Under Process') {
                        $('#attestation_no').hide();
                        $('#attestation_expiry').hide();
                    }
                });
            }).change();
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $("#tenant_name").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetch-tenant-contract-no') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            console.log(p);
                        }
                    });
                });
            }).change();
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection
