<!DOCTYPE html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name', 'AQARYCLICK') }}</title>

  <link rel="preconnect" href="https://fonts.gstatic.com/">
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&amp;family=Poppins:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
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
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <input type="email" class="form-control input-field" id="" placeholder="Enter Your User Name">
              </div>
              <div class="mb-3">
                <i class="fa fa-lock icon"></i>
                <input type="password" class="form-control input-field" id="" placeholder="Enter Your Password">
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
  @if(Session::has('success'))
                                    <p style="color:green">{{Session::get('success')}}</p>
                                @endif
                                @if(Session::has('error'))
                                    <p style="color:red">{{Session::get('error')}}</p>
                                @endif
                                  <div class="modal fade" id="registerdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            <!-- <div class="col-12 col-md-2" id="agent_check">
              <div class="form-check">
                <input class="form-check-input" name="form_radio" type="radio" value="" >
                <label class="form-check-label" for="agent_check">
                  Agent
                </label>
              </div>
            </div>
            <div class="col-md-3" id="owner_company_check" >
              <div class="form-check" >
                <input class="form-check-input" name="form_radio" type="radio" value="" >
                <label class="form-check-label own_cmp" for="owner_company_check" id="">
                  Owner Company
                </label>
              </div>
            </div>
            <div class="col-md-3" id="owner_individual_check">
              <div class="form-check">
                <input class="form-check-input" name="form_radio" type="radio" value="" >
                <label class="form-check-label own_cmp" for="owner_individual_check" id="own_ind">
                  Owner Individual
                </label>
              </div>
            </div>
            <div class="col-md-3" id="tnt_check">
              <div class="form-check">
                <input class="form-check-input" name="form_radio" type="radio" value="" >
                <label class="form-check-label" for="tenant_check">
                  Tenant
                </label>
              </div>
            </div> -->
            <div class="profile-header-nav ">
                        <!-- navbar -->
                        <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                            <button class="btn btn-icon navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i data-feather="align-justify" class="font-medium-5"></i>
                            </button>

                            <!-- collapse  -->
                            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                <div class="profile-tabs d-flex justify-content-between mt-1 mt-md-0">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
    <button class="nav-link active" id="agent_check"  data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true">Agent</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="owner_company_check" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="false">Owner Company</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="owner_individual_check" data-bs-toggle="tab" data-bs-target="#order" type="button" role="tab" aria-controls="contact" aria-selected="false">Owner Individual</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tnt_check" data-bs-toggle="tab" data-bs-target="#more" type="button" role="tab" aria-controls="more" aria-selected="false">Tenant</button>
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

              <form action="{{ route('admin.broker.store') }}" id="form" method="POST" enctype="multipart/form-data">
                            {{-- @if (isset($customer))
                            @method('patch')
                        @endif --}}
                            @csrf
                            
                            <div class="row gy-4 mb-3 " id="agent_checker">
                            <div class="card-header align-items-center d-flex" id="ow">
                            <hr>
                            <h4 class="card-title mb-0 flex-grow-1">Agent</h4>
                        </div>
                        <div class=" col-md-6">
                                    <label for="name" class="form-label">Agent Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Agent Name">
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
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <label for="owner_name" class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <label for="incharge_name" class="form-label"> Email </label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
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
                                <div class="col-md-6">
                                    <label for="space" class="form-label">Customer Type</label>
                                    <select class="form-control" id="customer" name="customer_type">
                                        <option value="">-----Select Customer-----</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Company">Company</option>
                                    </select>
                                </div>
                            </div>

                    <div class="row gy-4 mb-3" id="compname">
                        <div class="card-header align-items-center d-flex" id="company">
                            <hr>
                            <h4 class="card-title mb-0 flex-grow-1"> Company Detail</h4>
                        </div>
                        <div class="col-md-6" id="cname">
                            <label for="country" class="form-label">Company Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="col-md-6" id="cadd">
                            <label for="state" class="form-label">Company Address</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="company_address" placeholder="Company Address">
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
                                <input type="file" class="form-control" name="company_logo" placeholder="Company Logo">
                            </div>
                        </div>
                        <div class="col-md-6" id="fname">
                            <label for="country" class="form-label">Document Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="document_name" placeholder="Document name">
                            </div>
                        </div>
                        <div class="col-md-6" id="fname">
                            <label for="country" class="form-label">Document</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="document_file" placeholder="Upload File">
                            </div>
                        </div>
                        <div class="col-md-6" id="fname">
                            <label for="country" class="form-label">Serial Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="serial_number" placeholder="Upload File">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Document Exipry Date</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="document_exp_date" placeholder="Expiry Date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Company Reg. Num.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="reg_num" placeholder="Enter Reg. Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="space" class="form-label">Company Activity</label>
                            <select class="form-control" id="building" name="company_activity">
                                <option value="">-----Select Customer-----</option>
                                <option value="Trading_in_Computer_Software">Trading in Computer Software</option>
                                <option value="Real_Estate_Management">Real Estate Management</option>
                                <option value="Car_Spare_Part_Trading">Car Spare Part Trading</option>
                            </select>
                        </div>
                    </div>
                    <div class="row individual" >
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1"> Bank Detail</h4>
                    </div>
                    
                        <hr>
                        <div class="col-md-6 mb-2">
                            <label for="country" class="form-label">Bank Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="bank_name" placeholder="Bank Details">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="state" class="form-label">Account Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="account_number"
                                    placeholder="Company Address">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="country" class="form-label">IFSC Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="ifsc" placeholder="Company Name">
                            </div>
                        </div>
                    </div>
            
                        <div class="row gy-4 mb-3" id="tenant_check" >
                        <div class="card-header align-items-center d-flex" id="ow">
                            <hr>
                            <h4 class="card-title mb-0 flex-grow-1"> Tenant </h4>
                        </div>
                            <div class=" col-md-6">
                                <label for="name" class="form-label">File number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="file_number" placeholder="File Number">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <label for="owner_name" class="form-label">Tenant Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_code" placeholder="Tenant Code">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <label for="owner_name" class="form-label">Tenant Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_name" placeholder="Tenant Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="space" class="form-label">Tenant Type</label>
                                <select class="form-control" id="customer" name="customer_type">
                                    <option value="">-----Select Tenant Type-----</option>
                                    <option value="Personal">Personal</option>
                                    <option value="Company">Company</option>
                                </select>
                            </div>
                            <div class=" col-md-6">
                                <label for="incharge_name" class="form-label">Primary Phone number </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="primary_phone"
                                        placeholder="Primary Phone Number">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <label for="incharge_name" class="form-label">Secondary Phone number </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="secondary_phone"
                                        placeholder="Secondary Phone Number">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <label for="incharge_name" class="form-label">Email </label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email">
                                </div>
                            </div>
                      
                <div class="row gy-4 mb-3" id="cmpname">
                    <div class="col-md-6" id="cname">
                        <label for="country" class="form-label">Post Office Box</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="post_office" placeholder="Post Office">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="remark" class="form-label">Unit Address</label>
                        <textarea class="form-control" name="address">
                        </textarea>
                    </div>
                    <!-- <div class="col-md-6" id="authp">
                        <label for="country" class="form-label">Account Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="tenant_account_number"
                                placeholder=" Account Number ">
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <label for="space" class="form-label">Tenant Status</label>
                        <select class="form-control" name="tenant_status">
                            <option value="">-----Select Tenant Status-----</option>
                            <option value="new">New</option>
                            <option value="old">Old</option>
                            <option value="related">Related Party</option>
                        </select>
                    </div>
                    <div class="col-md-6" id="fname">
                        <label for="country" class="form-label">Document Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="document_name" placeholder="Document name">
                        </div>
                    </div>
                    <div class="col-md-6" id="fname">
                        <label for="country" class="form-label">Total Unit</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="total_unit" placeholder=" Total Unit">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="space" class="form-label">Tenant Nationality</label>
                        <select class="form-control" id="customer" name="customer_nationality">
                            <option value="">-----Select Tenant Nationality-----</option>
                            <option value="Indian">Indian</option>
                            <option value="Dubai">Dubai</option>
                            <option value="England">England</option>
                            <option value="Chinies">Chinies</option>
                            <option value="Russian">Russian</option>
                        </select>
                    </div>
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sponsor</h4>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">Sponsor Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_name" placeholder="sponsor Name">
                        </div>
                    </div><div class="col-md-6">
                        <label for="city" class="form-label">Sponsor Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_email" placeholder="Sponsor Email">
                        </div>
                    </div><div class="col-md-6">
                        <label for="city" class="form-label">Sponsor Phone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_phone" placeholder="sponsor Phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">Sponsor OID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_oid" placeholder="sponsor OID">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">File Attachment</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="attachment_file[]" placeholder="Attachment File" multiple>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="remark" class="form-label">Attachment Remark</label>
                        <textarea class="form-control" name="attachment_remark">
                        </textarea>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <label for="space" class="form-label">Document Type</label>
                        <select class="form-control" id="tenant_document_type" name="tenant_document">
                            <option value="">-----Select Document Type-----</option>
                            <option value="OID">OID</option>
                            <option value="CR">CR</option>
                            <option value="Passcode">Passcode</option>
                        </select>
                    </div><br>
                <div class="row">
                    <div class="col-md-6 mb-2" id="oid">
                        <label for="country" class="form-label">OID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="oid_document" placeholder="Oid Document Number">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2" id="cr">
                        <label for="state" class="form-label">CR</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cr_document"
                                placeholder="CR Document">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2" id="passcode">
                        <label for="country" class="form-label">Passcode</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="passcode" placeholder="Passcode Document">
                        </div>
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
                  <button type="sumbit" class="btn btn-primary save-btn" data-bs-toggle="modal" data-bs-target="#documentuploaddrop">Register</button>
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
        <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, pellentesque bibendum vel amet, facilisi ac sem sem. Sem ipsum mauris, leo morbi eget morbi. Ipsum ut nullam a ullamcorper eget. Sagittis, sed adipiscing eget neque, risus dapibus. Facilisis in quam adipiscing habitant commodo maecenas. Sem amet adipiscing pellentesque egestas. In non dolor, ut faucibus fringilla. Scelerisque id tincidunt faucibus erat nunc nibh amet morbi ut. Volutpat pellentesque eu nec sociis pretium massa, arcu. Cursus at interdum viverra suspendisse sit turpis pellentesque. Ut at rutrum purus, nibh ut scelerisque in.
Nisl at curabitur vitae suspendisse tristique a. Phasellus quam risus consequat sit. Sed morbi laoreet eget habitasse etiam tempor. Id lobortis purus facilisis consectetur gravida pellentesque purus ultricies. Amet pellentesque dignissim auctor et, viverra sed. Dolor eget sem ut pretium. Egestas lectus adipiscing consequat etiam. Lorem neque, adipiscing phasellus gravida odio neque, eros orci. Velit pellentesque est sed eleifend pellentesque duis est tortor.
Tincidunt urna feugiat elementum arcu magna. Consectetur arcu scelerisque convallis tristique. Suspendisse a tincidunt a in tellus eget adipiscing enim. Habitasse eu in tortor mauris elementum massa arcu. Ipsum dui commodo ultricies adipiscing dolor consectetur ante at. Nec tempor sapien, gravida nisl in blandit pretium mi. Lectus est nec leo sociis.

      <div class="term-btn row justify-content-md-center">
        <div class="col-md-12 mb-10">
        <button type="button" class="btn btn-secondary decline" data-bs-dismiss="modal">Decline</button>
        <button type="button" class="btn btn-primary accept">Accept</button>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="page-wrapper">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $( document ).ready(function() {
      // $("input[type='radio']").click(function(){
      //       var radioValue = $(".own_cmp").css('background-color','yellow');
            
      //           alert(radioValue);
            
      //   });
      $('#compname').hide();
  $('.individual').hide();
  $('#tenant_check').hide();
  $('#agent_checker').show();


  $("#tnt_check").click(function(){
   var at= $('#form').attr('action','/admin/tenant');
  $('#tenant_check').show();
  $('#agent_checker').hide();
  $('#compname').hide();
  $('.individual').hide();
});
  $("#owner_individual_check").click(function(){
    var at= $('#form').attr('action','/admin/customer');

  $('.individual').show();
  $('#agent_checker').hide();
  $('#compname').hide();
  $('#tenant_check').hide();

});
$("#owner_company_check").click(function(){
  var at= $('#form').attr('action','/admin/customer');
  $('#compname').show();
  $('#agent_checker').hide();
  $('.individual').hide();
  $('#tenant_check').hide();

  $("#agent_check").click(function(){
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
                    }else if (optionValue == 'Passcode') {
                        $('#passcode').show();
                    }
                });
            }).change();
        });
</script>