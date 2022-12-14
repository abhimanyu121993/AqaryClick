<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="background:#f1f0ee">
            <h4 class="mb-sm-0">{{ $breadcrumb_title ?? '' }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @if($breadcrumb_title == 'Dashboard')
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li> --}}
                        <h5 id="time"></h5>
                    @else
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: black !important;">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $breadcrumb_title ?? '' }}</li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
