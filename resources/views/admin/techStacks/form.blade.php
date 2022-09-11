@extends('admin.layouts.main')

@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Tech Stack</strong><span
            class="small ms-3">{{ $form_state == 'create' ? 'Create' : 'Update'}}</span></div>
    <div class="card-body">
        <div class="container">
            @if($form_state == 'create')
                <form method="POST" action="{{ route('techStacks.store') }}">
            @else
                <form method="POST" action="{{ route('techStacks.update',$techStack->id) }}">
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
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="instance_name"
                            name="name" type="text" value="{{ old('name',  $techStack->name ?? '') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name">Type</label>
                        <select class="select2 form-select" name="tech_stack_type_id" >
                            @foreach($techStackTypes as $data)
                            <option value="{{ $data->id }}" {{ old('tech_stack_type_id',  $techStack->tech_stack_type_id ?? '') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                            @endforeach
                        </select>
                        {{-- <select class=" form-select" >
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select> --}}
                        @error('tech_stack_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        let select2 = $('.select2').select2();
        //select2.data('select2').$selection.css('height', '38px');
    });

</script>
@endsection
