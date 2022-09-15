@extends('admin.layouts.main')

@section('custom-css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Project</strong></div>
    <div class="card-body">
        <div class="container">
            <a href="{{ route('projects.create') }}"><button class="btn btn-primary mb-3" type="button">Create</button></a>
        </div>
        <div class="container">
            <table id="table_datatables" class="display">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Workplace</th>
                        <th scope="col">Date Start</th>
                        <th scope="col">Date Finish</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
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
            ajax: '{!! route('projects.indexApi') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'workplace.instance_name', name: 'workplace.instance_name' },
                {   data: 'date_start', 
                    name: 'date_start',
                    render: (data, type, row) => {
                        if (!data) {
                            return '<p class="text-muted">(empty)</p>';
                        }
                        return data;
                    }
                 },
                 {  data: 'date_finish', 
                    name: 'date_finish',
                    render: (data, type, row) => {
                        if (!data) {
                            return '<p class="text-muted">(empty)</p>';
                        }
                        return data;
                    }
                 },
                { render : (data,type,row) => {
                   return ` <div class="col-auto">
                            <a href="{{ url('admin/projects') }}/${row.id}/edit" class="text-decoration-none">
                                <button class="btn btn-warning" type="button">
                                    <i class="icon icon-2xl cil-pen"></i>
                                </button>
                            </a>
                            <form method="POST" action="{{ url('admin/projects/') }}/${row.id}" class="d-inline form-delete">
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