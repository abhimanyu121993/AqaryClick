<div class="row document_file">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Document File</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <ul>
                @foreach($tenant as $r)
               @php $d=json_decode($r->attachment_file); @endphp
               @if(count($d)>0)
               @foreach($d as $file)
            <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<a href="{{ route('admin.getFileDownload',$file) }}">{{ $file??'' }}</a></li>
                @endforeach
                @endif
                @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row contract_file">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Contract</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <u>
                @foreach($contract as $c)
              <li><a href="{{ route('admin.receipt',$c->contract_code) }}" target="blank"> {{ $c->contract_code??'' }}</a></li>
                @endforeach
                    </u>
                </div>
            </div>
        </div>
    </div>

   

    <div class="row invoice_file">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Invoice</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <ul>
                @foreach($invoice as $inv)
              <li><a href="{{ url('admin/invoice-print', $inv->invoice_no)}}" target="blank"> {{ $inv->invoice_no??'' }}</a></li>
                @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>