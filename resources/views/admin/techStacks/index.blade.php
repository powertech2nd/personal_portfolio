@extends('admin.layouts.main')

@section('custom-css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Tech Stack</strong></div>
    <div class="card-body">
        <div class="container">
            <a href="{{ route('techStacks.create') }}"><button class="btn btn-primary mb-3" type="button">Create</button></a>
        </div>
        <div class="container">
            <table id="table_datatables" class="display">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($techStacks as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->techStackType->name }}</td>
                        <td>
                            <div class="col-auto">
                                <a href="{{ route('techStacks.edit', $data->id) }}" class="text-decoration-none">
                                    <button class="btn btn-warning" type="button">
                                        <i class="icon icon-2xl cil-pen"></i>
                                    </button>
                                </a>
                                <form method="POST" action="{{ route('techStacks.destroy',$data->id) }}" class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn delete" type="submit">
                                        <i class="icon icon-2xl cil-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
       
        {{-- {{ $techStacks->links() }} --}}
    </div>
</div>
@endsection

@section('custom-js')
<script>
$(document).on('click', '.form-delete', function(e){ 
     return confirm('Are you sure you want to delete this data?');
});
</script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    let table;
    $(document).ready(function () {
         table = $('#table_datatables').DataTable({
            processing: true, // display of a 'processing' indicator 
            serverSide: true, // server side processing
            pageLength: 10, // pagination size
            ajax: '{!! route('techStacks.indexApi') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'tech_stack_type.name', name: 'techStackType.name' }, // https://github.com/yajra/laravel-datatables/issues/2293#issuecomment-652458730
                { render : (data,type,row) => {
                   return ` <div class="col-auto">
                            <a href="{{ url('admin/techStacks') }}/${row.id}/edit" class="text-decoration-none">
                                <button class="btn btn-warning" type="button">
                                    <i class="icon icon-2xl cil-pen"></i>
                                </button>
                            </a>
                            <form method="POST" action="{{ url('admin/techStacks/') }}/${row.id}" class="d-inline form-delete">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn delete" type="submit">
                                    <i class="icon icon-2xl cil-trash"></i>
                                </button>
                            </form>
                        </div>
                    `;
                 }},
            ],
            
        });
    });

</script>

@endsection