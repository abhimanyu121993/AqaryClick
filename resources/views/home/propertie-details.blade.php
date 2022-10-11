@extends('home_layouts.master')

@section("content")
<!--- Owner Details -->
<div class="modal fade" id="ownerDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header head-model">
                <h5 class="modal-title">Owner Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body owner-body">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-lg-7">
                        <div class="post-comment-wrap style2">
                            <div class="comment-item">
                                <div class="comment-author_img">
                                    <img src="/front/assets/img/users/user.png" alt="Image">
                                </div>
                                <div class="comment-author_text">
                                    <div class="comment-author_info">
                                        <h6>Deepak Vishwakarma</h6>
                                        <p>Owner of Property</p>
                                    </div>
                                    <div class="address-user">
                                        <ul class="user-add">
                                            <li><i class="fa fa-map-marker icon"></i> 4140 Parker Rd. Allentown, New Mexico 31134 helle hello</li>
                                            <li><i class="fa fa-phone icon"></i> (704) 555-0127</li>
                                            <li><i class="fa fa-envelope icon"></i> alifazal123@example.com</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-5 col-sm-12 col-lg-5">
                        <div class="btb">
                            <span></span>
                            <h6>Request Inquiry</h6>
                            <form>
                                <div class="login-icons">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Full Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Message" rows="7"></textarea>
                                    </div>
                                </div>
                                <div class="login-btn-f">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Owner Details-->

<section class="mt-100">
    <div class="justify-content-md-center">
        <div class="col-lg-12 col-md-12">
            <ul id="lightgallery" class="list-unstyled  row mb-0" style="--bs-gutter-x: 0 !important; --bs-gutter-y: 0;">
                <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 " data-responsive="/front/assets/img/property/gallery/gallery-1.jpg" data-src="/front/assets/img/property/gallery/gallery-1.jpg" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                    <a href="#" class="wd-100p">
                        <img class="img-responsive" src="/front/assets/img/property/gallery/gallery-1.jpg" alt="Thumb-1">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 " data-responsive="/front/assets/img/property/gallery/gallery-2.jpg" data-src="/front/assets/img/property/gallery/gallery-2.jpg" data-sub-html="<h4>Gallery Image 2</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                    <a href="#" class="wd-100p">
                        <img class="img-responsive" src="/front/assets/img/property/gallery/gallery-2.jpg" alt="Thumb-2">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 " data-responsive="/front/assets/img/property/gallery/gallery-3.jpg" data-src="/front/assets/img/property/gallery/gallery-3.jpg" data-sub-html="<h4>Gallery Image 3</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                    <a href="#" class="wd-100p">
                        <img class="img-responsive" src="/front/assets/img/property/gallery/gallery-3.jpg" alt="Thumb-1">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 " data-responsive="/front/assets/img/property/gallery/gallery-4.jpg" data-src="/front/assets/img/property/gallery/gallery-4.jpg" data-sub-html=" <h4>Gallery Image 4</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                    <a href="#" class="wd-100p">
                        <img class="img-responsive" src="/front/assets/img/property/gallery/gallery-4.jpg" alt="Thumb-2">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 " data-responsive="/front/assets/img/property/gallery/gallery-5.jpg" data-src="/front/assets/img/property/gallery/gallery-5.jpg" data-sub-html="<h4>Gallery Image 5</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                    <a href="#" class="wd-100p">
                        <img class="img-responsive" src="/front/assets/img/property/gallery/gallery-5.jpg" alt="Thumb-1">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3  pl-md-2 pr-md-2" data-responsive="/front/assets/img/property/gallery/gallery-6.jpg" data-src="/front/assets/img/property/gallery/gallery-6.jpg" data-sub-html="<h4>Gallery Image 6</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                    <a href="#" class="wd-100p">
                        <img class="img-responsive" src="/front/assets/img/property/gallery/gallery-6.jpg" alt="Thumb-2">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 " data-responsive="/front/assets/img/property/gallery/gallery-6.jpg" data-src="/front/assets/img/property/gallery/gallery-6.jpg" data-sub-html="<h4>Gallery Image 7</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                    <a href="#" class="wd-100p">
                        <img class="img-responsive" src="/front/assets/img/property/gallery/gallery-6.jpg" alt="Thumb-1">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-3 col-md-3 col-xl-3 " data-responsive="/front/assets/img/property/gallery/gallery-6.jpg" data-src="/front/assets/img/property/gallery/gallery-6.jpg" data-sub-html="<h4>Gallery Image 8</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                    <a href="#" class="wd-100p">
                        <img class="img-responsive" src="/front/assets/img/property/gallery/gallery-6.jpg" alt="Thumb-2">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<div class="shop-wrap mt-5 mb-3">
    <div class="container">
        <div class="row gx-5">
            <div class="col-xl-12">
                <div class="content-wrapper">
                    <div class="row align-items-center mb-25">
                        <div class="col-xl-9 col-lg-5 col-md-4">
                            <div class="profuct-result">
                                <h2>Pinkvilla</h2>
                                <spna><i class="ri-map-pin-fill"></i> 2464 Royal Ln. Mesa, New Jersey 45463</spna>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4">
                            <h5><i class="fa fa-usd"></i> 230,000</h5>
                            <spna>1136sqft</spna>
                            <div class="filter-item-num  rent-btn mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ownerDetails">Owner Details <i class="fa fa-angle-down icons" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="team-wrap mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Description</h2>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="team-member">
                    <div class="justify">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elit, at eget fusce augue a, id sagittis lobortis. Vulputate leo, vel quis dui. A felis malesuada vitae at pharetra et. Mattis mauris proin hac nibh viverra eget mauris phasellus. Elementum egestas tortor id non faucibus eu congue nibh sed. Urna nunc pellentesque dolor ac a tincidunt varius.
                            Ac viverra orci, donec sed a odio fames at. Faucibus nibh volutpat, sem dignissim elementum volutpat amet, lectus. Nullam gravida duis purus nunc cum sed. Orci pulvinar vel pellentesque amet, mi at libero. At neque tortor vivamus pretium eleifend ac. In risus cras sagittis, turpis neque, a facilisis. Massa facilisi viverra dignissim egestas proin vulputate. Neque nec non malesuada leo id. Augue scelerisque nunc, tellus lacus, gravida pellentesque dolor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-wrap mb-3">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="team-member">
                    <div class="justify">
                        <h5 class="mb-3">Property Details</h5>
                        <div class="row justify-content-md-center">
                            <div class="col-md-4 col-sm-12 col-lg-4">
                                <dl>
                                    <dt>Property ID</dt>
                                    <dd>A236790</dd>
                                    <dt>Property Price</dt>
                                    <dd><i class="fa fa-usd"></i> 230,000</dd>
                                    <dt>Baths</dt>
                                    <dd>6</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>Property Type</dt>
                                    <dd>House</dd>
                                    <dt>Roome</dt>
                                    <dd>6</dd>
                                    <dt>Garages</dt>
                                    <dd>2</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>Property Status</dt>
                                    <dd>Sale</dd>
                                    <dt>Bedrooms</dt>
                                    <dd>7</dd>
                                    <dt>Year of build</dt>
                                    <dd>2020</dd>
                                </dl>
                            </div>
                        </div>

                        <h5 class="mb-3">Amenities</h5>
                        <div class="row ">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="amenties">
                                    <ul class="ul-list">
                                        <li><input type="checkbox" checked>deepak</li>
                                        <li><input type="checkbox" checked>deepak</li>
                                        <li><input type="checkbox" checked>deepak</li>
                                        <li><input type="checkbox" checked>deepak</li>
                                        <li><input type="checkbox" checked>deepak</li>
                                        <li><input type="checkbox" checked>deepak</li>
                                        <li><input type="checkbox" checked>deepak</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-wrap mb-3">
    <div class="container">
        <h2>What’s nearby </h2>
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="team-member">
                    <div class="justify">
                        <h5 class="mb-3"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h5>
                        <div class="row justify-content-md-center">
                            <div class="col-md-9 col-sm-9 col-lg-9">
                                <dl>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                </dl>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3">
                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>

                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>

                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>
                            </div>
                        </div>

                        <h5 class="mb-3"><i class="fa fa-hospital-o" aria-hidden="true"></i> Health & Clinic</h5>
                        <div class="row justify-content-md-center">
                            <div class="col-md-9 col-sm-9 col-lg-9">
                                <dl>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                </dl>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3">
                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>

                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>

                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>
                            </div>
                        </div>

                        <h5 class="mb-3"><i class="fa fa-truck" aria-hidden="true"></i> Transport</h5>
                        <div class="row justify-content-md-center">
                            <div class="col-md-9 col-sm-9 col-lg-9">
                                <dl>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                    <dt>Marry Education</dt>
                                    <dd>(15.25 miles)</dd>
                                </dl>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3">
                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>

                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>

                                <ul class="rating">
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-fill"></i> </li>
                                    <li> <i class="ri-star-line"></i> </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-wrap mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h2>Reviews</h2>
                <div class="team-member">
                    <div class="justify">
                        <div class="row justify-content-md-center">
                            <div class="post-comment-wrap style2">
                                <div class="comment-item">
                                    <div class="comment-author_img">
                                        <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                                    </div>
                                    <div class="comment-author_text">
                                        <div class="comment-author_info">
                                            <h6>Deepak Vishwakarma</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <p>10 April 2020</p>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <ul class="rating">
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-line"></i> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p>The user can create dummy content in words list items and proposals. Depending on your a user can fit any of these formats in their project, which adds a lot of conveniences.</p>
                                    </div>
                                </div>

                                <div class="comment-item">
                                    <div class="comment-author_img">
                                        <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                                    </div>
                                    <div class="comment-author_text">
                                        <div class="comment-author_info">
                                            <h6>Deepak Vishwakarma</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <p>10 April 2020</p>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <ul class="rating">
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-line"></i> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p>The user can create dummy content in words list items and proposals. Depending on your a user can fit any of these formats in their project, which adds a lot of conveniences.</p>
                                    </div>
                                </div>

                                <div class="comment-item">
                                    <div class="comment-author_img">
                                        <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                                    </div>
                                    <div class="comment-author_text">
                                        <div class="comment-author_info">
                                            <h6>Deepak Vishwakarma</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <p>10 April 2020</p>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <ul class="rating">
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-line"></i> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p>The user can create dummy content in words list items and proposals. Depending on your a user can fit any of these formats in their project, which adds a lot of conveniences.</p>
                                    </div>
                                </div>

                                <div class="comment-item">
                                    <div class="comment-author_img">
                                        <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                                    </div>
                                    <div class="comment-author_text">
                                        <div class="comment-author_info">
                                            <h6>Deepak Vishwakarma</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <p>10 April 2020</p>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <ul class="rating">
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-fill"></i> </li>
                                                        <li> <i class="ri-star-line"></i> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p>The user can create dummy content in words list items and proposals. Depending on your a user can fit any of these formats in their project, which adds a lot of conveniences.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-12 col-sm-12">
                <h2>Reviews & Rate Us</h2>
                <div class="team-member">
                    <div class="justify">
                        <h5 class="mb-1">Rating (4/5)</h5>
                        <ul class="rating">
                            <li> <i class="ri-star-fill"></i> </li>
                            <li> <i class="ri-star-fill"></i> </li>
                            <li> <i class="ri-star-fill"></i> </li>
                            <li> <i class="ri-star-fill"></i> </li>
                            <li> <i class="ri-star-line"></i> </li>
                        </ul>
                        <div class="row ">
                            <div class="input-icons post-fil">
                                <label class="form-label">Review</label>
                                <textarea class="form-control " rows="5"></textarea>
                            </div>

                            <div class="col-md-10">
                                <button type="button" class="btn btn-success cancle-btn">Cancle</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary post-btn">Post</button>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Recent Post</h2>
                <div class="team-member">
                    <div class="justify">
                        <div class="row ">
                            <div class="popular-post-widget">
                                <div class="pp-post-item mb-3">
                                    <div class="pp-post-img">
                                        <img src="/front/assets/img/post/post-1.jpg" alt="Image">
                                    </div>
                                    <div class="pp-post-info">
                                        <h6><a href="#"> University Class Will Start Soon While Lorem Ipsum Adid Ipsum</a></h6>
                                        <span>09 Jan 2021</span>
                                    </div>
                                </div>

                                <div class="pp-post-item mb-3">
                                    <div class="pp-post-img">
                                        <img src="/front/assets/img/post/post-2.jpg" alt="Image">
                                    </div>
                                    <div class="pp-post-info">
                                        <h6><a href="#"> University Class Will Start Soon While Lorem Ipsum Adid Ipsum</a></h6>
                                        <span>09 Jan 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection