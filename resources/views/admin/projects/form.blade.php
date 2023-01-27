@extends('admin.layouts.main')

@section('custom-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Project</strong><span
            class="small ms-3">{{ $form_state == 'create' ? 'Create' : 'Update'}}</span></div>
    <div class="card-body">
        <div class="container">
            @if($form_state == 'create')
                <form method="POST" action="{{ route('projects.store') }}">
            @else
                <form method="POST" action="{{ route('projects.update',$project->id) }}">
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
                            name="name" type="text" value="{{ old('name',  $project->name ?? '') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="10" cols="80">
                           {{ old('description',  $project->description ?? '') }}
                        </textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="order">Order</label>
                        <input class="form-control @error('order') is-invalid @enderror" id="order"
                            name="order" type="text" value="{{ old('order',  $project->order ?? '') }}">
                        @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name">Workplace</label>
                        <select class="select2 form-select @error('workplace_id') is-invalid @enderror" id="workplace_id" name="workplace_id" >

                        </select>
                        @error('workplace_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="date_start">Date Start</label>
                        <div class="input-group date">
                            <input type="date" onfocus="this.showPicker()"
                                class="form-control datepicker @error('date_start') is-invalid @enderror"
                                id="date_start" name="date_start"
                                value="{{ old('date_start', $project->date_start ?? '') }}">
                            {{-- <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="icon icon-2xl cil-calendar"></i>
                                </span>
                            </span> --}}
                            @error('date_start')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="date_finish">Date Finish</label>
                        <div class="input-group date">
                            <input type="date" onfocus="this.showPicker()"
                                class="form-control datepicker @error('date_finish') is-invalid @enderror"
                                id="date_start" name="date_finish"
                                value="{{ old('date_finish', $project->date_finish ?? '') }}">
                            {{-- <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="icon icon-2xl cil-calendar"></i>
                                </span>
                            </span> --}}
                            @error('date_finish')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name">Tech Stacks</label>
                        <select class="select2 form-select @error('tech_stack_ids') is-invalid @enderror" id="tech_stack_ids" name="tech_stack_ids[]" multiple="multiple">
                           
                        </select>
                        @error('tech_stack_ids')
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
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

<script>
    $(document).ready(function () {
        CKEDITOR.replace( 'description' );

        let select2PageSize = 10;
        $('#workplace_id').select2({
            ajax: {
                url: '{!! route('workplaces.dropdownList') !!}',
                delay : 250,
                cache: true,
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public',
                        page: params.page || 1,
                    }
                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data) {
                    return {
                        // Set options id and text
                        results:  $.map(data.data, function (item) {
                            return {
                                text: item.instance_name,
                                id: item.id
                            }
                        }),
                        pagination: {
                            // Determine when select2 will fetch data again to backend
                            more: (data.current_page * select2PageSize) < data.total
                        }
                    };
                }
            }
        });


        // Fetch the preselected item, and add to the control
        var select2Workplace = $('#workplace_id');
        $.ajax({
            type: 'GET',
            url: '{{ url("admin/workplaces/") }}/'+ '{{ old("workplace_id",  $project->workplace_id ?? "") }}'
        }).then(function (data) {
            // create the option and append to Select2
            var option = new Option(data.instance_name, data.id, true, true);
            select2Workplace.append(option).trigger('change');

            // manually trigger the `select2:select` event
            select2Workplace.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });




        $('#tech_stack_ids').select2({
            ajax: {
                url: '{!! route('techStacks.dropdownList') !!}',
                delay : 250,
                cache: true,
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public',
                        page: params.page || 1,
                    }
                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data) {
                    return {
                        // Set options id and text
                        results:  $.map(data.data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        }),
                        pagination: {
                            // Determine when select2 will fetch data again to backend
                            more: (data.current_page * select2PageSize) < data.total
                        }
                    };
                }
            }
        });


        // Fetch the preselected item, and add to the control
        var select2TechStacks = $('#tech_stack_ids');
        $.ajax({
            type: 'GET',
            url: '{{ route("techStacks.showList") }}',
            data: { tech_stack_ids : @json(old('tech_stack_ids', isset($project) ? $project->techStacks->pluck('id')->toArray() : null))}
        }).then(function (data) {
            // create the option and append to Select2
            if (data) {
                data.forEach(function(item) {
                    var option = new Option(item.name, item.id, true, true);
                    select2TechStacks.append(option).trigger('change');
                });
            }
           
        
            // manually trigger the `select2:select` event
            select2TechStacks.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });
    });

</script>
@endsection
