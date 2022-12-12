@extends('admin.includes.layout', ['breadcrumb_title' => 'Agents'])
@section('title', 'Add Agents')
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($pedit)? 'Update Profile' : 'Register Profile' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($pedit) ? route('admin.add-agents-profile.update', $pedit->id) :  route('admin.add-agents-profile.store')}}" method="POST" enctype="multipart/form-data">
                            @if (isset($pedit))
                            @method('put')
                        @endif
                            @csrf
                        {{-- <form action="{{ route('admin.add-agents-profile.store') }}" method="POST" enctype="multipart/form-data"> --}}
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="first_name" class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"  value="{{isset($pedit)? $pedit->full_name: '' }}" id="first_name" name="full_name"
                                            placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="last_name" class="form-label">Agents Profile</label>
                                    <div class="input-group">
                                        @if (isset($pedit))
                                         <img src="{{ asset($pedit->file) }}" class="me-75 bg-light-danger"
                                            style="height:60px;width:60px;" />
                                            <input type="File" class="form-control" id="last_name"  name="agent_profile"
                                            placeholder="Last Name">
                                        @else
                                        <input type="File" class="form-control" id="last_name"  name="agent_profile"
                                            placeholder="Last Name">
                                        @endif
                                        {{-- <img src="{{ asset($pedit->file) }}" class="me-75 bg-light-danger"
                                            style="height:60px;width:60px;" /> --}}

                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" value="{{isset($pedit)? $pedit->email: '' }}" class="form-control" id="email" name="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <input type="text" value="{{isset($pedit)? $pedit->phone: '' }}" class="form-control" id="phone" name="phone"
                                            placeholder="Phone">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="email" class="form-label">Facebbok Link</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{isset($pedit)? $pedit->facebook: '' }}" id="email" name="f_link"
                                            placeholder="Facebook Link">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="phone" class="form-label">Instagram Link</label>
                                    <div class="input-group">
                                        <input type="text" value="{{isset($pedit)? $pedit->instagram: '' }}" class="form-control" id="phone" name="insta_link"
                                            placeholder="Instagram Link">
                                    </div>
                                </div>
                                <!--end col-->
                            </div><div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="email" class="form-label">Twiter Link</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{isset($pedit)? $pedit->twiter: '' }}" id="email" name="t_link"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="phone" class="form-label">Linkedin</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{isset($pedit)? $pedit->linkedin: '' }}" id="phone" name="l_link"
                                            placeholder="Linkedin Link">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="email" class="form-label">Profile Status</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{isset($pedit)? $pedit->profile_status: '' }}" id="email" name="p_status"
                                            placeholder="Profile">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="email" class="form-label">About Agents</label>
                                    <div class="input-group">
                                        <textarea name="desc_agnt" placeholder="About In English" class="form-control" cols="10" rows="1">{{isset($pedit)? $pedit->description: '' }}</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="email" class="form-label">About Agents In Arabic</label>
                                    <div class="input-group">
                                        <textarea name="desc_agnt_arabic" placeholder="About In Arabic" class="form-control" cols="10" rows="1">{{isset($pedit)? $pedit->description_arabic: '' }}</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <button class="btn btn-primary" type="submit">{{isset($pedit) ? 'Update' : 'Submit'}}</button>
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
                    <h4 class="card-title mb-0 flex-grow-1">Manage Agents</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                    <table class="table table-nowrap container" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Profile Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Facebook Link</th>
                                <th scope="col">Instagrm Link</th>
                                <th scope="col">Twiter Link</th>
                                <th scope="col">Linkedin Link</th>
                                <th scope="col">Profile Status</th>
                                <th scope="col">Description</th>
                                <th scope="col">Description Arabic</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile as $pro)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $pro->full_name ?? '' }}</td>
                                    <td>
                                        <img src="{{ asset($pro->file) }}" class="me-75 bg-light-danger"
                                            style="height:60px;width:60px;" />
                                    </td>
                                    <td>{{ $pro->email ?? '' }}</td>
                                    <td>{{ $pro->phone ?? '' }}</td>
                                    <td>{{ $pro->facebook ?? '' }}</td>
                                    <td>{{ $pro->instagram ?? '' }}</td>
                                    <td>{{ $pro->twiter ?? '' }}</td>
                                    <td>{{ $pro->linkedin ?? '' }}</td>
                                    <td>{{ $pro->profile_status ?? '' }}</td>
                                    <td>{{ $pro->description ?? '' }}</td>
                                    <td>{{ $pro->description_arabic ?? '' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($pro->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.add-agents-profile.edit',$bid) }}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#"
                                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                                </li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.add-agents-profile.destroy', $bid) }}"
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
    {{-- <script>
    $('.is_active').on('click', function() {
        var id = $(this).val();
        var newurl = "{{ url('admin/isactive') }}/" + id;

        $.ajax({
            url: newurl,
            method: 'get',
            beforeSend: function() {
                $('.is_active').attr('disabled', 'true');
            },
            success: function() {

                $('.is_active').removeAttr('disabled')

            }
        });
    });
</script> --}}
@endsection
