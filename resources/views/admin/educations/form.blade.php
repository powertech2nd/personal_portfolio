@extends('admin.layouts.main')

@section('custom-css')
<link href="{{ asset('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Educations</strong><span class="small ms-3">{{ $form_state == 'create' ? 'Create' : 'Update'}}</span></div>
    <div class="card-body">
        <div class="container">
            @if($form_state == 'create')
            <form method="POST" action="{{ route('educations.store') }}">
                @else
                <form method="POST" action="{{ route('educations.update',$education->id) }}">
                    @method('PUT')
                    @endif
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="tab-pane p-3 active preview" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label" for="instance_name">Instance name</label>
                            <input class="form-control @error('instance_name') is-invalid @enderror" id="instance_name"
                                name="instance_name" type="text"
                                value="{{ old('instance_name',  $education->instance_name ?? '') }}">
                            @error('instance_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="major">Major</label>
                            <input class="form-control  @error('major') is-invalid @enderror" id="major" name="major"
                                type="text" value="{{ old('major', $education->major ?? '') }}">
                            @error('major')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="city">City</label>
                            <input class="form-control  @error('city') is-invalid @enderror" id="city" name="city"
                                type="text" value="{{ old('city', $education->city ?? '') }}">
                            @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="date_start">Date Start</label>
                            <div class="input-group date">
                                <input type="text"
                                    class="form-control datepicker @error('date_start') is-invalid @enderror"
                                    id="date_start" name="date_start"
                                    value="{{ \Carbon\Carbon::parse(old('date_start', $education->date_start ?? ''))->format('d/m/Y') }}">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white d-block">
                                        <i class="icon icon-2xl cil-calendar"></i>
                                    </span>
                                </span>
                                @error('date_start')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="date_finish">Date Finish</label>
                            <div class="input-group date">
                                <input type="text"
                                    class="form-control datepicker @error('date_finish') is-invalid @enderror"
                                    id="date_finish" name="date_finish"
                                    value="{{ \Carbon\Carbon::parse(old('date_finish', $education->date_finish ?? ''))->format('d/m/Y') }}">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white d-block">
                                        <i class="icon icon-2xl cil-calendar"></i>
                                    </span>
                                </span>
                                @error('date_finish')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input
                                        class="form-check-input  @error('is_currently_studying') is-invalid @enderror"
                                        id="is_currently_studying" name="is_currently_studying" type="checkbox"
                                        value="1" {{ old('is_currently_studying', $education->is_currently_studying ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_currently_studying">Is currently
                                        studying</label>
                                    @error('is_currently_studying')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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

    $('#is_currently_studying').change(function () {
        if($(this).is(':checked')) {
            $('#date_finish').val("").datepicker("update");
        }
    });
   

    //$("[name='date_start']").datepicker("update", new Date());
    //$("[name='date_finish']").datepicker("update", new Date());
</script>
@endsection
