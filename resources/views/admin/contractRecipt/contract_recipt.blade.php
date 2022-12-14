@extends('admin.includes.layout', ['breadcrumb_title' => 'Contract Reciept Edit'])
<style>
    #card-header{
       background:#c8f4f6;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
   }
   #pop{
       color: black !important;
   }
   #header1
   {
       background: #ecf0f3;
       border: none !important;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
       box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
   }
   #h1
   {
       color: black;
   }
   #example
   {
       font-size: 14px;
   }
   thead
    {
        background:#c9e6e7 !important;
    }
   input ,select,textarea ,#building_type{
       border-radius: 10px !important;
       border: none !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset !important;
   }
   .dataTables_info,.dataTables_paginate {
       font-weight: bolder;
   }
   #btn-btn
   {
       background:#ffffff;
       color: black;
       border: none;
       border-radius: 10px !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;}
   #btn-btn:hover
   { box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;}
</style>
@section('title', 'Contract Reciept Edit')
@section('main-content')
    
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <div class="row">
        <form action="{{ route('admin.contract-recipt.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6" id="p1">
                <label for="remark" class="form-label" id="h1">Preamble </label>
                <textarea class="form-control" name="clause_one_english"> 
                       {!!$contract->clause_one_english!!}

                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1" >Preamble Arabic</label>
                <textarea class="form-control" name="clause_one_arabic"> {!!$contract->clause_one_arabic!!}
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1" >Clause One English</label>
                <textarea class="form-control" name="clause_two_english">
                {!!$contract->clause_two_english!!}
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1" >Clause One Arabic</label>
                <textarea class="form-control" name="clause_two_arabic">
                {!!$contract->clause_two_arabic!!}
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1" >Clause Two English</label>
                <textarea class="form-control" name="clause_three_english">
                {!!$contract->clause_three_english!!}
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Two Arabic</label>
                <textarea class="form-control" name="clause_three_arabic">
                {!!$contract->clause_three_arabic!!}
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Three English</label>
                <textarea class="form-control" name="clause_four_english">
                {!!$contract->clause_four_english!!}
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Three Arabic</label>
                <textarea class="form-control" name="clause_four_arabic">
                {!!$contract->clause_four_arabic!!}
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Four English</label>
                <textarea class="form-control" name="clause_five_english">
                {!!$contract->clause_five_english!!}

                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Four Arabic</label>
                <textarea class="form-control" name="clause_five_arabic">
                {!!$contract->clause_five_arabic!!}

                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Five English</label>
                <textarea class="form-control" name="clause_six_english">
                {!!$contract->clause_six_english!!}

                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Five Arabic</label>
                <textarea class="form-control" name="clause_six_arabic">
                {!!$contract->clause_six_arabic!!}

                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1" >Clause Six English</label>
                <textarea class="form-control" name="clause_seven_english">
                {!!$contract->clause_seven_english!!}

                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Six Arabic</label>
                <textarea class="form-control" name="clause_seven_arabic">
                {!!$contract->clause_seven_arabic!!}

                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Seven English</label>
                <textarea class="form-control" name="clause_eight_english">
                {!!$contract->clause_eight_english!!}

                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Seven Arabic</label>
                <textarea class="form-control" name="clause_eight_arabic">
                {!!$contract->clause_eight_arabic!!}

                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Eight English</label>
                <textarea class="form-control" name="clause_nine_english">
                {!!$contract->clause_nine_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Eight Arabic</label>
                <textarea class="form-control" name="clause_nine_arabic">
                {!!$contract->clause_nine_arabic!!}

                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Nine English</label>
                <textarea class="form-control" name="clause_ten_english">
                {!!$contract->clause_ten_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Nine Arabic</label>
                <textarea class="form-control" name="clause_ten_arabic">
                {!!$contract->clause_ten_arabic!!}

                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Ten English</label>
                <textarea class="form-control" name="clause_eleven_english">
                {!!$contract->clause_eleven_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Ten Arabic</label>
                <textarea class="form-control" name="clause_eleven_arabic">
                {!!$contract->clause_eleven_arabic!!}

                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Eleven English</label>
                <textarea class="form-control" name="clause_twelve_english">
                {!!$contract->clause_twelve_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Eleven Arabic</label>
                <textarea class="form-control" name="clause_twelve_arabic">
                {!!$contract->clause_twelve_arabic!!}

                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Twelve English</label>
                <textarea class="form-control" name="clause_therteen_english">
                {!!$contract->clause_therteen_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Twelve Arabic</label>
                <textarea class="form-control" name="clause_therteen_arabic">
                {!!$contract->clause_therteen_arabic!!}
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Thirteen English</label>
                <textarea class="form-control" name="clause_fourteen_english">
                {!!$contract->clause_fourteen_english!!}
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Thirteen Arabic</label>
                <textarea class="form-control" name="clause_fourteen_arabic">
                {!!$contract->clause_fourteen_arabic!!}

                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Fourteen English</label>
                <textarea class="form-control" name="clause_fiftyteen_english">
                {!!$contract->clause_fiftyteen_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Fourteen Arabic</label>
                <textarea class="form-control" name="clause_fiftyteen_arabic">
                {!!$contract->clause_fiftyteen_arabic!!}
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Fifteen English</label>
                <textarea class="form-control" name="clause_sixteen_english">
                {!!$contract->clause_sixteen_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Fifteen Arabic</label>
                <textarea class="form-control" name="clause_sixteen_arabic">
                {!!$contract->clause_sixteen_arabic!!}

                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Sixteen English</label>
                <textarea class="form-control" name="clause_seventeen_english">
                {!!$contract->clause_seventeen_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Sixteen Arabic</label>
                <textarea class="form-control" name="clause_seventeen_arabic">
                {!!$contract->clause_seventeen_arabic!!}

                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Seventeen Arabic</label>
                <textarea class="form-control" name="clause_eighteen_english">
                {!!$contract->clause_eighteen_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Seventeen Arabic</label>
                <textarea class="form-control" name="clause_eighteen_arabic">
                {!!$contract->clause_eighteen_arabic!!}

                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12" id="card-header">
            <div class="col-md-6">
                <label for="remark" class="form-label"id="h1">Clause Eighteen English</label>
                <textarea class="form-control" name="clause_nineteen_english">
                {!!$contract->clause_nineteen_english!!}

                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label" id="h1">Clause Eighteen Arabic</label>
                <textarea class="form-control" name="clause_nineteen_arabic">
                {!!$contract->clause_nineteen_arabic!!}
                            </textarea>
            </div>
        </div>
        <br>
        <div class="row gy-4">
            <div class="col-xxl-3 col-md-3">
                <button class="btn btn-success" id="btn-btn" type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>
    </div>
    </div>

@endsection
@section('script-area')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
        CKEDITOR.replace('clause_one_english');
        CKEDITOR.replace('clause_one_arabic');
        CKEDITOR.replace('clause_two_english');
        CKEDITOR.replace('clause_two_arabic');
        CKEDITOR.replace('clause_three_english');
        CKEDITOR.replace('clause_three_arabic');
        CKEDITOR.replace('clause_four_english');
        CKEDITOR.replace('clause_four_arabic');
        CKEDITOR.replace('clause_five_english');
        CKEDITOR.replace('clause_five_arabic');
        CKEDITOR.replace('clause_six_english');
        CKEDITOR.replace('clause_six_arabic');
        CKEDITOR.replace('clause_seven_english');
        CKEDITOR.replace('clause_seven_arabic');
        CKEDITOR.replace('clause_eight_english');
        CKEDITOR.replace('clause_eight_arabic');
        CKEDITOR.replace('clause_nine_english');
        CKEDITOR.replace('clause_nine_arabic');
        CKEDITOR.replace('clause_ten_english');
        CKEDITOR.replace('clause_ten_arabic');
        CKEDITOR.replace('clause_eleven_english');
        CKEDITOR.replace('clause_eleven_arabic');
        CKEDITOR.replace('clause_twelve_english');
        CKEDITOR.replace('clause_twelve_arabic');
        CKEDITOR.replace('clause_therteen_english');
        CKEDITOR.replace('clause_therteen_arabic');
        CKEDITOR.replace('clause_fourteen_english');
        CKEDITOR.replace('clause_fourteen_arabic');
        CKEDITOR.replace('clause_fiftyteen_english');
        CKEDITOR.replace('clause_fiftyteen_arabic');
        CKEDITOR.replace('clause_sixteen_english');
        CKEDITOR.replace('clause_sixteen_arabic');
        CKEDITOR.replace('clause_seventeen_english');
        CKEDITOR.replace('clause_seventeen_arabic');
        CKEDITOR.replace('clause_eighteen_english');
        CKEDITOR.replace('clause_eighteen_arabic');
        CKEDITOR.replace('clause_nineteen_english');
        CKEDITOR.replace('clause_nineteen_arabic');
    </script>



@endsection
