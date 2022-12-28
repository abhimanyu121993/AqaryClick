@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Contract'])
@section('title', 'Manage Contract')

@section('main-content')
<div class="card">
    <div class="card-header align-items-center d-flex table-main-heading">
        <h4 class="card-title mb-0 flex-grow-1">Manage Grace </h4>
    </div>
    <div class="card-body  table-responsive">
        <table class="display table table-bordered dt-responsive dataTable dtr-inline  table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
            <thead class="thead-color">
                <tr>
                    <th scope="col">Sr.</th>
                    <th scope="col">Grace Start Date</th>
                    <th scope="col">Grace End Date</th>
                    <th scope="col">Grace Period Month</th>
                    <th scope="col">Grace Period Day</th>
                </tr>
            </thead>
            <tbody id="grace_loop">
                @if(isset($graceDetails))
                @foreach ($graceDetails as $grace )
                {{ $grace }}
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{Carbon\Carbon::parse($grace->grace_start_date)->format('d M Y') ?? ''}}</td>
                    <td>{{Carbon\Carbon::parse($grace->grace_end_date)->format('d M Y') ??''}}</td>
                    <td>{{$grace->grace_period_month??''}} Months</td>
                    <td>{{$grace->grace_period_day??''}} Days</td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">No Records!</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script-area')
@endsection