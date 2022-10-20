@extends('admin.includes.layout', ['breadcrumb_title' => 'Tenants Document'])
@section('title', 'Tenants Document')
@section('main-content')

                                @php $pics=json_decode($document->attachment_file); @endphp

                                    <div class="row gy-4 m-2">
                                    @foreach ($pics as $pic)
                                <div class="col-xxl-3 col-md-6">
                                @if (pathinfo($pic, PATHINFO_EXTENSION) == 'jpg')
                                        <li> <img src="{{ asset('upload/tenent/' . $pic) }}" width="500" height="500"/></li>
                                        @endif
                                        @if (pathinfo($pic, PATHINFO_EXTENSION) == 'png')
                                        <li> <img src="{{ asset('upload/tenent/' . $pic) }}" width="500" height="500"/></li>
                                        @endif
                                        @if (pathinfo($pic, PATHINFO_EXTENSION) == 'jpeg')
                                        <li> <img src="{{ asset('upload/tenent/' . $pic) }}" width="500" height="500"/></li>
                                        @endif
                                        @if (pathinfo($pic, PATHINFO_EXTENSION) == 'webp')
                                        <li><img src="{{ asset('upload/tenent/' . $pic) }}" width="500" height="500"/></li>
                                        @endif
                                        @if (pathinfo($pic, PATHINFO_EXTENSION) == 'icon')
                                        <li> <img src="{{ asset('upload/tenent/' . $pic) }}" width="500" height="500"/></li>
                                        @endif
                                        @if (pathinfo($pic, PATHINFO_EXTENSION) == 'ico')
                                        <li> <img src="{{ asset('upload/tenent/' . $pic) }}" width="500" height="500"/></li>
                                        @endif
                                        @if (pathinfo($pic, PATHINFO_EXTENSION) == 'pdf')
                                        <object data="{{ asset('upload/tenant/' . $pic) }}" type="application/pdf" title="SamplePdf" width="500" height="500" alt="pdf">
                                        </object>
                                        @endif
                                        </div>

                                        @endforeach
                                <!--end col-->
                            </div>


@endsection
@section('script-area')
@endsection
