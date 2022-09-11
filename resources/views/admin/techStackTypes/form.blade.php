@extends('admin.layouts.main')

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Tech Stack Type</strong><span class="small ms-3">{{ $form_state == 'create' ?? 'Create' ?? 'Update'}}</span></div>
    <div class="card-body">
        <div class="container">
            @if($form_state == 'create')
            <form method="POST" action="{{ route('techStackTypes.store') }}">
                @else
                <form method="POST" action="{{ route('techStackTypes.update',$techStackType->id) }}">
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
                                name="name" type="text"
                                value="{{ old('name',  $techStackType->name ?? '') }}">
                            @error('name')
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

