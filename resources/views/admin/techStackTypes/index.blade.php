@extends('admin.layouts.main')

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Tech Stack Type</strong></div>
    <div class="card-body">
        <div class="container">
            <a href="{{ route('techStackTypes.create') }}"><button class="btn btn-primary mb-3" type="button">Create</button></a>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($techStackTypes as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>
                            <div class="col-auto">
                                <a href="{{ route('techStackTypes.edit', $data->id) }}" class="text-decoration-none">
                                    <button class="btn btn-warning" type="button">
                                        <i class="icon icon-2xl cil-pen"></i>
                                    </button>
                                </a>
                                <form method="POST" action="{{ route('techStackTypes.destroy',$data->id) }}" class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn delete" type="submit">
                                        <i class="icon icon-2xl cil-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       
        {{ $techStackTypes->links() }}
    </div>
</div>
@endsection

@section('custom-js')
<script>
$(document).on('click', '.form-delete', function(e){ 
     return confirm('Are you sure you want to delete this data?');
});
</script>

@endsection