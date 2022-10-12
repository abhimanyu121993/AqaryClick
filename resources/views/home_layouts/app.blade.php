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
            <div class="col-md-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Agent
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Owner Company
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Owner Individual
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  TENANT
                </label>
              </div>
            </div>
            <div class="col-md-8 mt-3">
              <div class="register">
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
              </div>
            </div>
            <div class="col-md-3 col-sm-12 col-lg-4 mt-3">
              <div class="justify-content-md-center">
                <div class="profile-image">
                  <img src="/front/assets/img/users/user.png">
                </div>
                <span class="edit-logo">Edit Logo</span>
              </div>
              <button class="btn btn-primary show-btn">Show</button>
              <button class="btn btn-default hide-btn">Hide</button>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12 mt-3">
              <div class="row justify-content-md-center">
                <div class="col-md-2">
                  <button class="btn btn-primary save-btn" data-bs-toggle="modal" data-bs-target="#documentuploaddrop">Register</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!---document upload---->
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
