@extends('admin.layouts.main')

@section('custom-css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Workplaces</strong></div>
    <div class="card-body">
        <div class="container">
            <a href="{{ route('workplaces.create') }}"><button class="btn btn-primary mb-3"
                    type="button">Create</button></a>
        </div>
        <div class="container">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Instance Name</th>
                        <th>City</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Date Join</th>
                        <th>Date Leave</th>
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
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable({
            processing: true, // display of a 'processing' indicator 
            serverSide: true, // server side processing
            pageLength: 2, // pagination size
            ajax: '{!! route('workplaces.indexApi') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'instance_name', name: 'instance_name' },
                { data: 'city', name: 'city' },
                { data: 'position', name: 'position' },
                { data: 'description', name: 'description' },
                { data: 'date_join', name: 'date_join' },
                { data: 'date_leave', name: 'date_leave' },
            ]
        });
    });
</script>
@endsection
