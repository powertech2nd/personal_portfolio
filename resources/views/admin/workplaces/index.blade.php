@extends('admin.layouts.main')

@section('custom-css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" />
<link href="{{ asset('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header"><strong>Workplaces</strong></div>
    <div class="card-body">
        <div class="container">
            <button type="button" class="btn btn-primary mb-3" data-coreui-toggle="modal"
                data-coreui-target="#modalFormWorkplace" id="btnOpenFormWorkplaceCreate">Create</button>
            @include('admin.workplaces._form')
        </div>
        <div class="container">
            <table id="table_workplaces" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Instance Name</th>
                        <th>City</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Date Join</th>
                        <th>Date Leave</th>
                        <th></th>
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
    let table;
    $(document).ready(function () {
         table = $('#table_workplaces').DataTable({
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
                { data: 'date_join', name: 'date_join',  width: "90px" },
                { data: 'date_leave', name: 'date_leave', width: "90px" },
                { data: 'Action', name: 'Action', 'orderable': false, 'searchable': false, width: '90px'},
            ]
        });
    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.min.js')  }}"></script>
<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });

</script>

<script>
    const FORM_WORKPLACE_STATE_CREATE = 'create';
    const FORM_WORKPLACE_STATE_UPDATE = 'update';

    let form_workplace_state = FORM_WORKPLACE_STATE_CREATE;

    $('#btnOpenFormWorkplaceCreate ').on('click', function(e) {
        form_workplace_state = FORM_WORKPLACE_STATE_CREATE
    });

    $('#is_current_workplace').change(function () {
        if($(this).is(':checked')) {
            $('#date_leave').val("").datepicker("update");
        }
    });

    function FormWorkplaceSubmit() {
        // $("#modalFormWorkplace form").attr('action', "{{ route('workplaces.store') }}");
        // $("#modalFormWorkplace form").attr('method', "POST");

        ClearErrorMessages();

        let ajax_type = "POST";
        let ajax_url = "{{ route('workplaces.store') }}";

        if(form_workplace_state == FORM_WORKPLACE_STATE_UPDATE) {
            ajax_type = "PUT";
           
        }

        // $.ajax({
        //     type: ajax_type,
        //     url: ajax_url,
        //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //     data: $("#formWorkplace").serialize(),
        //     success: function (msg) {
        //         alert(msg);
        //     },
        //     error: function(XMLHttpRequest, textStatus, errorThrown) {
        //         ShowErrorMessages(XMLHttpRequest.responseJSON.errors);
        //     }
        // });

        var form = $("#formWorkplace").get(0);
        var data = new FormData(form);

        $.ajax({
            type: ajax_type,
            processData: false,
            contentType: false,
            url: ajax_url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: data,
            success: function (msg) {
                table.ajax.reload();
                toastr.success(msg.message);
                ClearFormWorkplace();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                ShowErrorMessages(XMLHttpRequest.responseJSON.errors);
            }
        });
    }

    $('#modalFormWorkplace #btnSubmit').on('click', function(e) {
        e.preventDefault();
        FormWorkplaceSubmit();
    });

    function ClearFormWorkplace() {
        $("#modalFormWorkplace :input").val('');
    }

    function ShowErrorMessages(errors) {
        $.each(errors, function(i,val){
			const firstItem = i;
			const firstItemDOM = document.getElementById(firstItem);
			const firstErrorMessage = val[0];

		 	// give highlight error to textbox
            firstItemDOM.classList.add('is-invalid')

		 	//show error message
            $(firstItemDOM).siblings(".invalid-feedback").html(firstErrorMessage);
		 })
    }

    function ClearErrorMessages() {
        //remove old/previous error message
        const errorMessages = document.querySelectorAll(".invalid-feedback");
        errorMessages.forEach((element)=>element.textContent='');

        //remove old/previous highlight textbox error
        const formGroups = document.querySelectorAll('.form-control');
        formGroups.forEach((element)=>element.classList.remove('is-invalid'));
    }

    //action DeleteWorkplace
	function DeleteWorkplace(id){
		var popup = confirm("Do you want to delete this data?");
		var csrf_token= $('meta[name="csrf_token"').attr("content");


		if (popup == true) {
			$.ajax({
				url:"{{url('admin/workplaces')}}"+"/"+id,
				type:"DELETE",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				//data:{'_method':'DELETE','_token':"{{ csrf_token() }}"},
			})
			.done(function(data){
				table.ajax.reload();
				toastr.success('Success delete data');
			})
			.fail(function(){
				toastr.error('Error deleting data');

			})
		}
	}
</script>
@endsection
