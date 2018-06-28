@extends('layouts.dashboard')
@section('section')

@section('title')

	{{ $title }}

@endsection
@section('section')
	<!-- display restaurant list -->
	
	<div class="table-responsive text-center">	
			<div class="row">
				<div class="col-sm-12">
					@section ('table_panel_title','Restaurants')
					@section ('table_panel_body')
					@include('widgets.table', array('class'=>''))
					@endsection
					@include('widgets.panel', array('header'=>true, 'as'=>'table'))
				</div>

	<!-- modal content -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>

				<div class="modal-body">

					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="control-label col-sm-2" for="id">ID</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fid" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name">
							</div>
						</div>
						  <div class="form-group">
							<label class="control-label col-sm-2" for="hotkey">Hotkey</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="hotkey" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="subhotkey">Subhotkey</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="subhotkey">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="address">Address</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="address">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="phone">Phone</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="phone">
							</div>
						</div>
					</form>

					<div class="deleteContent">
						Are you Sure you want to delete <span class="dname"></span> ? <span
						class="hidden did"></span>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class='glyphicon'> </span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
    $(document).ready(function() {
        
        $('#table').DataTable({
			dom: 'Bfrtip',
	        buttons: [
	            {
	                extend: 'print',
	                exportOptions: {
	                    columns: ':visible'
	                }
	            },
	            {
	                extend: 'csv',
	                exportOptions: {
	                    columns: ':visible'
	                }
	            },
	            {
	                extend: 'excel',
	                exportOptions: {
	                    columns: ':visible'
	                }
	            },
	            {
	                extend: 'pdf',
	                exportOptions: {
	                    columns: ':visible'
	                }
	            },
	            'colvis'

	        ],
	        columnDefs: [ {
	            targets: -1,
	            visible: false
	        }]
		});

    });
    $(document).on('click', '.edit-modal', function() {
		$('#footer_action_button').text("Update");
		$('#footer_action_button').addClass('glyphicon-check');
		$('#footer_action_button').removeClass('glyphicon-trash');
		$('.actionBtn').addClass('btn-success');
		$('.actionBtn').removeClass('btn-danger');
		$('.actionBtn').removeClass('delete');
		$('.actionBtn').addClass('edit');
		$('.modal-title').text('Edit');
		$('.deleteContent').hide();
		$('.form-horizontal').show();
		var stuff = $(this).val().split(',');
		fillmodaluser(stuff)
		$('#myModal').modal('show');
	});

	$(document).on('click', '.delete-modal', function() {
		$('#footer_action_button').text(" Delete");
		$('#footer_action_button').removeClass('glyphicon-check');
		$('#footer_action_button').addClass('glyphicon-trash');
		$('.actionBtn').removeClass('btn-success');
		$('.actionBtn').addClass('btn-danger');
		$('.actionBtn').removeClass('edit');
		$('.actionBtn').addClass('delete');
		$('.modal-title').text('Delete');
		$('.deleteContent').show();
		$('.form-horizontal').hide();
		var stuff = $(this).val().split(',');
		console.log($(this).val('info'));
		$('.did').text(stuff[0]);
		$('.dname').html(stuff[1]);
		$('#myModal').modal('show');
	});

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}'

		}
	});

	$('.modal-footer').on('click', '.edit', function() {

		$.ajax({
			type: 'post',
			url: "{{ url('/restaurant/update') }}",
			data: {
				'id'  : $('#fid').val(),
				'name': $('#name').val(),
				'hotkey': $('#hotkey').val(),
				'subhotkey': $('#subhotkey').val(),
				'address': $('#address').val(),
				'phone': $('#phone').val(),

			},
			success: function(response) {
				$('.restaurant' + response.id).find('.name').html(response.name);
				$('.restaurant' + response.id).find('.hotkey').text(response.hotkey);
				$('.restaurant' + response.id).find('.subhotkey').text(response.subhotkey);
				$('.restaurant' + response.id).find('.address').text(response.address);
				$('.restaurant' + response.id).find('.phone').text(response.phone); 
			}
		});
	});

	$('.modal-footer').on('click', '.delete', function() {
	
		$.ajax({
			type: 'post',
			url: "{{ url('/restaurant/delete') }}",
			data: {
				'id': $('.did').text()
			},
			success: function(response) {
				$('#table').DataTable()
					.row( $('.restaurant' + response.id) )
					.remove()
					.draw();
			}
		});
	});

	function fillmodaluser(details){
		$('#fid').val(details[0]);
		$('#name').val(details[1]);
		$('#hotkey').val(details[2]);
		$('#subhotkey').val(details[3]);
		$('#address').val(details[4]);
		$('#phone').val(details[5]);
	}
</script>
 @endsection