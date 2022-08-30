@extends('admin.layouts.main')

@section('custom-css')
<link href="{{ asset('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Educations</strong><span class="small ms-3">Create</span></div>
    <div class="card-body">
        <div class="container">
            <form>
                <div class="tab-pane p-3 active preview" role="tabpanel">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Instance name</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Majors</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">City</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Date Start</label>
                        <div class="input-group date">
                            <input type="text" class="form-control datepicker" id="datepicker">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="icon icon-2xl cil-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Date Finish</label>
                        <div class="input-group date">
                            <input type="text" class="form-control datepicker" id="datepicker">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="icon icon-2xl cil-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" id="gridCheck1" type="checkbox">
                                <label class="form-check-label" for="gridCheck1">Is currently studying</label>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.min.js')  }}"></script>

<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });
</script>
@endsection
