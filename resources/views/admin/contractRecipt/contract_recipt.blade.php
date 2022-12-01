@extends('admin.includes.layout', ['breadcrumb_title' => 'Contract Reciept Edit'])
@section('title', 'Contract Reciept Edit')
@section('main-content')
    
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <div class="row">
        <form action="{{ route('admin.contract-recipt.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row col-lg-12">
            <div class="col-md-6" id="p1">
                <label for="remark" class="form-label">Preamble </label>
                <textarea class="form-control" name="clause_one_english">
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Preamble Arabic</label>
                <textarea class="form-control" name="clause_one_arabic">
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause One English</label>
                <textarea class="form-control" name="clause_two_english">
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause One Arabic</label>
                <textarea class="form-control" name="clause_two_arabic">
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Two English</label>
                <textarea class="form-control" name="clause_three_english">
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Two Arabic</label>
                <textarea class="form-control" name="clause_three_arabic">
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Three English</label>
                <textarea class="form-control" name="clause_four_english">
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Three Arabic</label>
                <textarea class="form-control" name="clause_four_arabic">
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Four English</label>
                <textarea class="form-control" name="clause_five_english">
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Four Arabic</label>
                <textarea class="form-control" name="clause_five_arabic">
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Five English</label>
                <textarea class="form-control" name="clause_six_english">
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Five Arabic</label>
                <textarea class="form-control" name="clause_six_arabic">
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Six English</label>
                <textarea class="form-control" name="clause_seven_english">
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Six Arabic</label>
                <textarea class="form-control" name="clause_seven_arabic">
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Seven English</label>
                <textarea class="form-control" name="clause_eight_english">
                        </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Seven Arabic</label>
                <textarea class="form-control" name="clause_eight_arabic">
                    </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Eight English</label>
                <textarea class="form-control" name="clause_nine_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Eight Arabic</label>
                <textarea class="form-control" name="clause_nine_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Nine English</label>
                <textarea class="form-control" name="clause_ten_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Nine Arabic</label>
                <textarea class="form-control" name="clause_ten_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Ten English</label>
                <textarea class="form-control" name="clause_eleven_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Ten Arabic</label>
                <textarea class="form-control" name="clause_eleven_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Eleven English</label>
                <textarea class="form-control" name="clause_twelve_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Eleven Arabic</label>
                <textarea class="form-control" name="clause_twelve_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Twelve English</label>
                <textarea class="form-control" name="clause_therteen_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Twelve Arabic</label>
                <textarea class="form-control" name="clause_therteen_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Thirteen English</label>
                <textarea class="form-control" name="clause_fourteen_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Thirteen Arabic</label>
                <textarea class="form-control" name="clause_fourteen_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Fourteen English</label>
                <textarea class="form-control" name="clause_fiftyteen_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Fourteen Arabic</label>
                <textarea class="form-control" name="clause_fiftyteen_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Fifteen English</label>
                <textarea class="form-control" name="clause_sixteen_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Fifteen Arabic</label>
                <textarea class="form-control" name="clause_sixteen_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Sixteen English</label>
                <textarea class="form-control" name="clause_seventeen_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Sixteen Arabic</label>
                <textarea class="form-control" name="clause_seventeen_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Seventeen Arabic</label>
                <textarea class="form-control" name="clause_eighteen_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Seventeen Arabic</label>
                <textarea class="form-control" name="clause_eighteen_arabic">
                            </textarea>
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Eighteen English</label>
                <textarea class="form-control" name="clause_nineteen_english">
                                </textarea>
            </div>
            <div class="col-md-6">
                <label for="remark" class="form-label">Clause Eighteen Arabic</label>
                <textarea class="form-control" name="clause_nineteen_arabic">
                            </textarea>
            </div>
        </div>
        <br>
        <div class="row gy-4">
            <div class="col-xxl-3 col-md-3">
                <button class="btn btn-success" type="submit">Submit</button>
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
