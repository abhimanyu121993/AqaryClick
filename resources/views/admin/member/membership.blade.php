@extends('admin.includes.layout', ['breadcrumb_title' => 'Membership'])
@section('title', 'Membership')
@section('main-content')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"> Membership</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        {{-- @if (isset($customer))
                        @method('patch')
                    @endif --}}
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
                            <div class="col-md-12">
                                <div class=" col-md-6">
                                    <label for="name" class="form-label">Id</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="id"
                                            value="" placeholder="Enter Id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Title</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="remark" class="form-label">Description</label>
                                <textarea class="form-control" name="desc">
                                </textarea>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">User Count</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="user_count"
                                        placeholder="Enter Tenant Name (English)">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Icon</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="icon"
                                        placeholder="Enter Tenant Name (Arabic)">
                                </div>
                            </div>
                            {{-- <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Document Type</label>
                                <select class="form-control" id="tenant_document_type" name="tenant_document">
                                    <option value="" selected hidden>-----Select Document Type-----</option>
                                    <option value="QID">QID</option>
                                    <option value="CR">CR</option>
                                    <option value="Passport">Passport</option>
                                </select>
                            </div> --}}

                            <div class="col-xxl-3 col-md-3 mb-2" id="qid">
                                <label for="country" class="form-label">Font Color</label>
                                <div class="input-group">
                                    <input type="color" class="form-control" name="qid_document"
                                        placeholder="Qid Document Number">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2" id="cr">
                                <label for="state" class="form-label">Text Color</label>
                                <div class="input-group">
                                    <input type="color" class="form-control" name="cr_document" placeholder="CR Document">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2" id="passport">
                                <label for="country" class="form-label">Background Color</label>
                                <div class="input-group">
                                    <input type="color" class="form-control" name="passport"
                                        placeholder="Passport Document">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Is Active</label>
                                <select class="form-control" id="tenant_document_type" name="tenant_document">
                                    <option value="" selected hidden>-----Is Active-----</option>
                                    <option value="QID">True</option>
                                    <option value="CR">False</option>
                                </select>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Price</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price"
                                        placeholder="Tenant Secondary Mobile No">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="country" class="form-label">Total unit</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="total_unit" name="total_unit"
                                        placeholder=" Total Unit " readonly>
                                </div>
                            </div>

                            <!-- test -->

                        <div id="sponser" class="row">
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-3">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('script-area')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
        CKEDITOR.replace('desc');
    </script>
@endsection
