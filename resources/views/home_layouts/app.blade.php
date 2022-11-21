<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'AQARYCLICK') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&amp;family=Poppins:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="/front/assets/img/favicon.png" type="image/png">

    <link href="/front/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/assets/css/style.css" rel="stylesheet">

    <link href="/front/assets/css/jquery-ui-min.css" rel="stylesheet">

    <link href="/front/assets/css/line-awesome.min.css" rel="stylesheet">
    <link href="/front/assets/css/remixicon.css" rel="stylesheet">

    <link href="/front/assets/css/animate.min.css" rel="stylesheet">

    <link href="/front/assets/css/swiper-min.css" rel="stylesheet">

    <link href="/front/assets/css/magnific-popup.css" rel="stylesheet">

    <link href="/front/assets/scss/style.css" rel="stylesheet">
    <!-- Internal Gallery css-->
    <link href="/front/assets/gallery/gallery.css" rel="stylesheet">
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.min.css') }}">

</head>

<body>

    <!-- login modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="login-img row justify-content-md-center">
                        <img src="/front/assets/img/logo2.png">
                    </div>
                    <form>
                        <div class="login-icons">
                            <div class="mb-3">
                                <i class="fa fa-user icon"></i>
                                <input type="email" class="form-control input-field" id=""
                                    placeholder="Enter Your User Name">
                            </div>
                            <div class="mb-3">
                                <i class="fa fa-lock icon"></i>
                                <input type="password" class="form-control input-field" id=""
                                    placeholder="Enter Your Password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="login-btn-f">
                                <a href="">
                                    Forgot your password?
                                </a>
                                <button type="submit" class="btn btn-primary">log in</button>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="text-center mt-70">
                                Not a member? <a href="/register">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- register modal -->
    {{-- @if (Session::has('success'))
        <p style="color:green">{{ Session::get('success') }}</p>
    @endif
    @if (Session::has('error'))
        <p style="color:red">{{ Session::get('error') }}</p>
    @endif --}}
    <div class="modal fade" id="registerdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <h4>Who You Are ? </h4>
                        </div>
                        <div class="profile-header-nav ">
                            <!-- navbar -->
                            <nav
                                class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                <button class="btn btn-icon navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <i data-feather="align-justify" class="font-medium-5"></i>
                                </button>

                                <!-- collapse  -->
                                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                    <div class="profile-tabs d-flex justify-content-between mt-1 mt-md-0">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="agent_check" data-bs-toggle="tab"
                                                    data-bs-target="#contact" type="button" role="tab"
                                                    aria-controls="contact" aria-selected="true">Agent</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="owner_company_check"
                                                    data-bs-toggle="tab" data-bs-target="#address" type="button"
                                                    role="tab" aria-controls="address"
                                                    aria-selected="false">Owner Company</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="owner_individual_check"
                                                    data-bs-toggle="tab" data-bs-target="#order" type="button"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">Owner Individual</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="tnt_check" data-bs-toggle="tab"
                                                    data-bs-target="#more" type="button" role="tab"
                                                    aria-controls="more" aria-selected="false">Tenant</button>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <!--/ collapse  -->
                            </nav>
                            <!--/ navbar -->
                        </div>
                        <div class="col-md-12 mt-3">
                            <!-- <div class="register">
                <div class="mb-3 row">
                  <label class="col-sm-4 col-form-label">My Full Name is</label>
                  <div class="col-sm-10 col-md-6">
                    <input type="text" class="form-control" placeholder="Full Name">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-4 col-form-label">My Contact Number</label>
                  <div class="col-sm-10 col-md-6">
                    <input type="text" class="form-control" placeholder="Contact Number">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-4 col-form-label">My Address</label>
                  <div class="col-sm-10 col-md-6">
                    <input type="text" class="form-control" placeholder="Company Address">
                  </div>
                </div>
              </div> -->

                            <form action="{{ route('admin.broker.store') }}" id="form" method="POST"
                                enctype="multipart/form-data">
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

                                <div class="row gy-4 mb-3 " id="agent_checker">
                                    <div class="card-header align-items-center d-flex" id="ow">
                                        <hr>
                                        <h4 class="card-title mb-0 flex-grow-1">Agent</h4>
                                    </div>
                                    <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Broker/Agent</label>
                                <select class="form-control select2 form-select" id="flag" name="boker_agent">
                                @if (isset($brokeredit))
                                    <option value="{{ $brokeredit->broker_agent }}" selected>{{ $brokeredit->broker_agent}}</option>
                                    @else
                                <option value="" selected hidden>--Select Type--</option>   
                                <option value="broker">Broker</option>
                                    <option value="agent">Agent</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Join Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="join_date" name="join_date" value="{{Carbon\Carbon::now()->format('d-m-Y') }}" placeholder="Enter Join Date " readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Broker First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="broker_fname" name="broker_fname" value="{{isset($brokeredit)? $broker->broker_name: '' }}" placeholder="first Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Broker Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="broker_lname" name="broker_lname" value="{{isset($brokeredit)? $broker->broker_lname: '' }}" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Broker ID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="broker_id" name="broker_id" value="{{isset($brokeredit)? $broker->broker_id: '' }}" placeholder="Broker Id">
                                    </div>
                                </div><div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{isset($broker)? $broker->mobile: '' }}" placeholder="Mobile No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="email" name="email" value="{{isset($brokeredit)? $brokeredit->email: '' }}" placeholder="abc@gmail.com">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="password" name="password" value="" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Broker Type</label>
                                <select class="form-control select2 form-select" id="broker_type" name="boker_type">
                                @if (isset($brokeredit))
                                    <option value="{{ $brokeredit->broker_type }}" selected>{{ $brokeredit->broker_type}}</option>
                                    @else
                                <option value="" selected hidden>--Select Type--</option>   
                                <option value="personal">Personal</option>
                                    <option value="company">Company</option>
                                    @endif
                                </select>
                            </div>
                          
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Property Type</label>
                                <select class="form-control select2 form-select" id="broker_type" name="boker_type">
                                @if (isset($brokeredit))
                                    <option value="{{ $brokeredit->property_type }}" selected>{{ $brokeredit->perperty_type}}</option>
                                    @else
                                <option value="" selected hidden>--Select Type--</option>   
                                <option value="unit">Unit</option>
                                    <option value="building">Building</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Unit Ref.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="unit_ref" name="unit_ref" value="{{isset($brokeredit)? $brokeredit->unit_ref: '' }}" placeholder="Enter Broker Commission">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Building Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="building_name" name="building_name" value="{{isset($brokeredit)? $brokeredit->building_name: '' }}" placeholder="Enter Building Name">
                                    </div>
                                </div>
                                <!--end col-->
                                </div>

                                <div class="row gy-4 mb-3 individual">
                                    <div class="card-header align-items-center d-flex" id="ow">
                                        <hr>
                                        <h4 class="card-title mb-0 flex-grow-1"> Owner Individual</h4>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="name" class="form-label">First Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="owner_name" class="form-label">Last Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="incharge_name" class="form-label"> Email </label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="incharge_name" class="form-label">Phone number </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="incharge_name" class="form-label">Customer Code</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="customer_code"
                                                placeholder="Customer Code">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="remark" class="form-label">Address</label>
                                        <textarea class="form-control" name="address">
                                    </textarea>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label for="space" class="form-label">Customer Type</label>
                                        <select class="form-control" id="customer" name="customer_type">
                                            <option value="">-----Select Customer-----</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Company">Company</option>
                                        </select>
                                    </div> --}}
                                </div>

                                <div class="row gy-4 mb-3" id="compname">
                                    <div class="card-header align-items-center d-flex" id="company">
                                        <hr>
                                        <h4 class="card-title mb-0 flex-grow-1"> Company Detail</h4>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="name" class="form-label">First Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="owner_name" class="form-label">Last Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="incharge_name" class="form-label">Phone number </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="incharge_name" class="form-label"> Email </label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="email_company_ind"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="password" name="password_company_ind" value="" placeholder="Enter Password">
                                    </div>
                                </div>
                                    <div class="col-md-6" id="cname">
                                        <label for="country" class="form-label">Company Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="company_name"
                                                placeholder="Company Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="cadd">
                                        <label for="state" class="form-label">Company Address</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="company_address"
                                                placeholder="Company Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="authp">
                                        <label for="country" class="form-label">Authorized Person</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="authorised_manager"
                                                placeholder="Authorized Person Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="cmplog">
                                        <label for="state" class="form-label">Company Logo</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="company_logo"
                                                placeholder="Company Logo">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="fname">
                                        <label for="country" class="form-label">Document Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="document_name"
                                                placeholder="Document name">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="fname">
                                        <label for="country" class="form-label">Document</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="document_file"
                                                placeholder="Upload File">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city" class="form-label">Document Exipry Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="document_exp_date"
                                                placeholder="Expiry Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city" class="form-label">Company Reg. Num.</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="reg_num"
                                                placeholder="Enter Reg. Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="space" class="form-label">Company Activity</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="company_activity"
                                                placeholder="Enter Activity">
                                        </div>
                                    </div>
                                </div>
                                <div class="row individual">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"> Bank Detail</h4>
                                    </div>

                                    <hr>
                                    <div class="col-md-6 mb-2">
                                        <label for="country" class="form-label">Bank Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="bank_name"
                                                placeholder="Bank Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="state" class="form-label">Account Number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="account_number"
                                                placeholder="Account No">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="country" class="form-label">IFSC Code</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ifsc"
                                                placeholder="Ifsc No    ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row gy-4 mb-3" id="tenant_check">
                                    <div class="card-header align-items-center d-flex" id="ow">
                                        <hr>
                                        <h4 class="card-title mb-0 flex-grow-1"> Tenant </h4>
                                    </div>
                                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row gy-4 mb-3">
                        <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Tenant Type</label>
                                <select class="form-control" id="tenant_type" name="tenant_type">
                                    <option value="" selected hidden>--Select Tenant Type--</option>
                                    <option value="TP">Personal</option>
                                    <option value="TC">Company</option>
                                </select>
                            </div>
                        <div class=" col-xxl-3 col-md-3">
                                <label for="name" class="form-label">File No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="file_no" name="file_no" value="" placeholder="Enter File No">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Tenant Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_code" placeholder="Enter Tenant Code">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Name <sup class="text-danger">(English)</sup> </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_english_name" placeholder="Enter Tenant Name (English)">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Name <sup class="text-danger">(Arabic)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_arabic_name" placeholder="Enter Tenant Name (Arabic)">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Document Type</label>
                                <select class="form-control" id="tenant_document_type" name="tenant_document">
                                    <option value="" selected hidden>--Select Document Type--</option>
                                    <option value="QID">QID</option>
                                    <option value="CR">CR</option>
                                    <option value="Passport">Passport</option>
                                </select>
                            </div>
                        
                            <div class="col-xxl-3 col-md-3 mb-2" id="qid">
                                <label for="country" class="form-label">QID</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="qid_document" placeholder="Qid Document Number">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2" id="cr">
                                <label for="state" class="form-label">CR</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cr_document"
                                        placeholder="CR Document">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2" id="passport">
                                <label for="country" class="form-label">Passport</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="passport" placeholder="Passport Document">
                                </div>
                            </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="owner_name" class="form-label">Tenant Primary Mobile No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tenant_primary_mobile" placeholder="Tenant Priamry Mobile No">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="owner_name" class="form-label">Tenant Secondary Mobile No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tenant_secondary_mobile" placeholder="Tenant Secondary Mobile No">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="incharge_name" class="form-label">Email </label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="password" name="password" value="" placeholder="Enter Password">
                                    </div>
                                </div>
                            <div class="col-xxl-3 col-md-3" id="cname">
                                <label for="country" class="form-label">Post Office Box</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="post_office" placeholder="Post Office">
                                </div>
                            </div>
                        <div class="col-xxl-3 col-md-3 mb-2">
                            <label for="space" class="form-label">Tenant Nationality</label>
                            <select class="form-select js-example-basic-single" id="customer" name="tenant_nationality">
                                <option value="">--Select Tenant Nationality--</option>
                                @foreach($nation as $nationality)
                                <option value="{{$nationality->name}}">{{$nationality->name}}</option>
                               @endforeach
                            </select>
                        </div>                      
                                
                            <div class="col-xxl-3 col-md-12">
                                <label for="remark" class="form-label">Unit Address</label>
                                <textarea class="form-control" name="unit_address">
                                </textarea>
                            </div>
                            
                            <div class="col-xxl-3 col-md-3 mb-2">
                            <label for="space" class="form-label">Building Name</label>
                            <select class="form-select js-example-basic-single" id="building_name" name="building_name">
                                <option value="">--Select Building--</option>
                                @foreach($building as $buld)
                                <option value="{{$buld->id}}">{{$buld->name}}</option>
                               @endforeach
                            </select>
                        </div> 
                        <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Unit Type</label>
                            <div class="input-group">
                                <select class="form-select js-example-basic-single" id="unit_type" name="unit_type">
                                <option value="">--Select Unit--</option>
                            </select>
                        </div>
                            </div>
                            <!-- <div class="col-xxl-3 col-md-3">
                        <label for="country" class="form-label">Total unit</label>
                        <div class="input-group">
                            <input type="text" class="form-control"  id="total_unit" name="total_unit"
                                placeholder=" Total Unit " readonly>
                        </div>
                    </div> -->
                    <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Status</label>
                                <select class="form-control" id="process" name="status">
                                    <option value="" selected hidden>-----Select Status-----</option>
                                    <option value="New Tenant">New Tenant</option>
                                    <option value="Old Tenant">Old Tenant</option>
                                    <option value="Related Party">Related Party</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Rental Period</label>
                                <select class="form-control" id="rental_period" name="rental_period">
                                    <option value="" selected hidden>-----Select Type-----</option>
                                    <option value="Days">Days</option>
                                    <option value="Months">Months</option>
                                    <option value="Years">Years</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3" id="rental_time">
                        <label for="country" class="form-label" id="change_rental_time">Days</label>
                        <div class="input-group">
                            <input type="text" id="change_placeholder" class="form-control"   name="rental_time"
                                placeholder=" Enter No of Days ">
                        </div>
                    </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Payment Method</label>
                                <select class="form-control" id="payment_method" name="payment_method">
                                    <option value="" selected hidden>-----Select Payment Method-----</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheques">Cheques</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3" id="account_no">
                        <label for="country" class="form-label">Account Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="account_no"
                                placeholder=" Account Number ">
                        </div>
                    </div>
                            <div class="col-xxl-3 col-md-3" id="has_cheque">
                                <label for="country" class="form-label">Receipt Of Cheques</label><br>
                            <div class="form-check-inline ">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" value="yes" name="payment_receipt">Yes
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" value="no" name="payment_receipt">No
                                </label>
                              </div>

                              <!-- test -->
                            </div>
                            <div id="sponser" class="row">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sponsor</h4>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">Sponsor Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_name" placeholder="sponsor Name">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">Sponsor OID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_oid" placeholder="sponsor OID">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">Sponsor Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_email" placeholder="Sponsor Email">
                        </div>
                    </div><div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">Sponsor Phone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_phone" placeholder="sponsor Phone">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3 mb-3">
                            <label for="space" class="form-label">Sponsor Nationality</label>
                            <select class="form-select js-example-basic-single" id="sponser_nationality" name="sponsor_nationality">
                                <option value="">---Select Sponsor Nationality---</option>
                                @foreach($nation as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                               @endforeach
                            </select>
                        </div>
                            </div>
                    
                    <div class="col-xxl-3 col-md-12">
                        <label for="city" class="form-label">File Attachment</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="attachment_file[]" placeholder="Attachment File" multiple>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-12">
                        <label for="remark" class="form-label">Remark</label>
                        <textarea class="form-control" name="attachment_remark">
                        </textarea>
                    </div>
                                    </div>
                                </div>
                                <div>
                                </div>
                        </div>

                    </div>
                    <!-- <div class="col-md-3 col-sm-12 col-lg-4 mt-3">
              <div class="justify-content-md-center">
                <div class="profile-image">
                  <img src="/front/assets/img/users/user.png">
                </div>
                <span class="edit-logo">Edit Logo</span>
              </div>
              <button class="btn btn-primary show-btn">Show</button>
              <button class="btn btn-default hide-btn">Hide</button>
            </div> -->
                    <div class="col-md-12 col-sm-12 col-lg-12 mt-3">
                        <div class="row justify-content-md-center">
                            <div class="col-md-2">
                                <button type="sumbit" class="btn btn-primary save-btn" data-bs-toggle="modal"
                                    data-bs-target="#documentuploaddrop">Register</button>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- -document upload--
  <div class="modal fade" id="documentuploaddrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <div class="close-btn">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
              <h4>Upload Document ? </h4>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12 mt-3">
              <div class="register">
                <div class="mb-3 row">
                  <label class="col-sm-5 col-form-label">CR No - </label>
                  <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-5 col-form-label">LICENSE No - </label>
                  <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-5 col-form-label">COMPUTER CARD - </label>
                  <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-5 col-form-label">TAX CARD No - </label>
                  <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-5 col-form-label">AUTHORISED PERSON FOR SIGNAGURE - </label>
                  <div class="col-sm-10 col-md-6">
                    <input type="file" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
            <div class="login-btn-f">
              <a href="">
                Forgot your password?
              </a>
              <button type="submit" class="btn btn-primary">log in</button>
            </div>
            </div>

            <div class="col-md-12 ">
              <div class="text-center mt-70">
            Not a member? <a href="/register">Register</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div> -->



    <!-- Term & Conditions -->
    <div class="modal fade" id="termModal" tabindex="-1" aria-labelledby="termModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body term-body">
                    <h5 class="modal-title" id="termModalLabel">Term & Conditions</h5>
                    <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, pellentesque
                        bibendum vel amet, facilisi ac sem sem. Sem ipsum mauris, leo morbi eget morbi. Ipsum ut nullam
                        a ullamcorper eget. Sagittis, sed adipiscing eget neque, risus dapibus. Facilisis in quam
                        adipiscing habitant commodo maecenas. Sem amet adipiscing pellentesque egestas. In non dolor, ut
                        faucibus fringilla. Scelerisque id tincidunt faucibus erat nunc nibh amet morbi ut. Volutpat
                        pellentesque eu nec sociis pretium massa, arcu. Cursus at interdum viverra suspendisse sit
                        turpis pellentesque. Ut at rutrum purus, nibh ut scelerisque in.
                        Nisl at curabitur vitae suspendisse tristique a. Phasellus quam risus consequat sit. Sed morbi
                        laoreet eget habitasse etiam tempor. Id lobortis purus facilisis consectetur gravida
                        pellentesque purus ultricies. Amet pellentesque dignissim auctor et, viverra sed. Dolor eget sem
                        ut pretium. Egestas lectus adipiscing consequat etiam. Lorem neque, adipiscing phasellus gravida
                        odio neque, eros orci. Velit pellentesque est sed eleifend pellentesque duis est tortor.
                        Tincidunt urna feugiat elementum arcu magna. Consectetur arcu scelerisque convallis tristique.
                        Suspendisse a tincidunt a in tellus eget adipiscing enim. Habitasse eu in tortor mauris
                        elementum massa arcu. Ipsum dui commodo ultricies adipiscing dolor consectetur ante at. Nec
                        tempor sapien, gravida nisl in blandit pretium mi. Lectus est nec leo sociis.

                    <div class="term-btn row justify-content-md-center">
                        <div class="col-md-12 mb-10">
                            <button type="button" class="btn btn-secondary decline"
                                data-bs-dismiss="modal">Decline</button>
                            <button type="button" class="btn btn-primary accept">Accept</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <!--Toaster Js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <script>
            $(document).ready(function() {
                // $("input[type='radio']").click(function(){
                //       var radioValue = $(".own_cmp").css('background-color','yellow');

                //           alert(radioValue);

                //   });
                $('#compname').hide();
                $('.individual').hide();
                $('#tenant_check').hide();
                $('#agent_checker').show();


                $("#tnt_check").click(function() {
                    var at = $('#form').attr('action', '/admin/tenant');
                    $('#tenant_check').show();
                    $('#agent_checker').hide();
                    $('#compname').hide();
                    $('.individual').hide();
                });
                $("#owner_individual_check").click(function() {
                    var at = $('#form').attr('action', '/owner-company');

                    $('.individual').show();
                    $('#agent_checker').hide();
                    $('#compname').hide();
                    $('#tenant_check').hide();

                });
                $("#owner_company_check").click(function() {
                    var at = $('#form').attr('action', '/owner-company');
                    $('#compname').show();
                    $('#agent_checker').hide();
                    $('.individual').hide();
                    $('#tenant_check').hide();

                    $("#agent_check").click(function() {
                        $('#agent_checker').show();
                        $('#compname').hide();
                        $('#tenant_check').hide();
                        $('.individual').hide();
                    });


                });
            });
        </script>

        <script>
            //    alert();
            $(document).ready(function() {
                // alert("jhgigygyugy");
                $("#tenant_document_type").change(function() {
                    $('#oid').hide();
                    $('#cr').hide();
                    $('#passcode').hide();
                    $(this).find("option:selected").each(function() {
                        var optionValue = $(this).attr("value");
                        if (optionValue == 'OID') {
                            $('#oid').show();
                        } else if (optionValue == 'CR') {
                            $('#cr').show();
                        } else if (optionValue == 'Passcode') {
                            $('#passcode').show();
                        }
                    });
                }).change();
            });
        </script>

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });

</script>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->

<script>
$(document).ready(function() {
                $('#qid').hide();
                $('#cr').hide();
                $('#passport').hide();
            $("#tenant_document_type").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'QID') {
                        $('#qid').show();
                        $('#cr').hide();
                        $('#passport').hide();

                    } else if (optionValue == 'CR') {
                        $('#cr').show();
                        $('#qid').hide();
                        $('#passport').hide();
 
                    }else if (optionValue == 'Passport') {
                        $('#passport').show();
                        $('#qid').hide();
                        $('#cr').hide();

                    }
                });
            }).change();
        });
</script>
<script>
$(document).ready(function() {
    $('#sponser').hide();
            $("#tenant_type").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'TC') {
                        $('#sponser').show();

                    } else if (optionValue == 'TP') {
                        $('#sponser').hide(); 
                    }
                    var newurl = "{{ url('/admin/fetch-tenant-file-no') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                  $('#file_no').val(p);
                    }
                });
                });
            }).change();
        });
</script>
<script>
$(document).ready(function() {
    $('#account_no').hide(); 
    $('#has_cheque').hide(); 
                $("#payment_method").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'Cash') {
                        $('#has_cheque').hide(); 
                        $('#account_no').hide(); 

                    } else if (optionValue == 'Cheques') {
                        $('#has_cheque').show();
                        $('#account_no').hide();

                    }
                    else if (optionValue == 'Transfer Bank') {
                        $('#has_cheque').hide(); 
                        $('#account_no').show();

                    }
                });
            }).change();
        });
</script>
<script>
    $(document).ready(function() {
        $("#building_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-building-details') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        console.log(p);
                  $('#unit_type').html(p.html);
                  $('#total_unit').val(p.total_unit);
                    }
                });
            });
        }).change();
    });
</script>
<script>
$(document).ready(function() {
    $('#rental_time').hide(); 
                $("#rental_period").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'Days') {
                        $('#rental_time').show();
                        $('#change_rental_time').text("Days") ;
                        $('#change_placeholder').attr('placeholder','Enter No Of Days');
                        } else if (optionValue == 'Months') {
                        $('#rental_time').show(); 
                        $('#change_rental_time').text("Months") ;
                        $('#change_placeholder').attr('placeholder','Enter No Of Months');

                    }
                    else if (optionValue == 'Years') {
                        $('#rental_time').show(); 
                        $('#change_rental_time').text("Years");
                        $('#change_placeholder').attr('placeholder','Enter No Of Years');

                    }
                });
            }).change();
        });
</script>
