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
					<table class="table {{ $class }}" id="table">
						<thead>
							<tr>
								<th class="text-center">Serial No.</th>
								<th class="text-center">User ID</th>
								<th class="text-center">Name</th>
								<th class="text-center">E-Mail</th>
								<th class="text-center">Status</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						{{$i = NULL}}
						@foreach($users as $user)
							<tr class="shop{{$shop->id}}">
								<td class="fid">{{++$i}}</td>
								<input type="hidden" id="fid" name="fid" value='{{}}''>
								<td class="shop_name">{{$user->name}}</td>
								<td class="shop_code">{{$user->email}}</td>
								<td class="shop_manager_name">{{$user->status}}</td>
								<td>
									<button class="edit-modal btn btn-info" value="{{$user->id}},{{$user->name}}, {{$user->email}}, {{$user->status}}">
										<span class="glyphicon glyphicon-edit"></span> Edit
									</button>
									<button class="delete-modal btn btn-danger" value="{{$user->id}},{{$user->name}}">
										<span class="glyphicon glyphicon-trash"></span> Delete
									</button>
								</td>
							</tr>
						@endforeach
					</table>

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
							<label class="control-label col-sm-2" for="shop_name">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="shop_name">
							</div>
						</div>
						  <div class="form-group">
							<label class="control-label col-sm-2" for="shop_code">Shop Code</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="shop_code">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="shop_manager_name">Shop Manager Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="shop_manager_name">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="shop_contact">Shop Contact</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="shop_contact">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="address">Address</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="address">
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
			url: "{{ url('/list/update') }}",
			data: {
				'id'  : $('#fid').val(),
				'name': $('#shop_name').val(),
				'email': $('#shop_code').val(),
				'shop_manager_name': $('#shop_manager_name').val(),
				'shop_contact': $('#shop_contact').val(),
				'address': $('#address').val(),

			},
			success: function(response) {
				$('.shop' + response.id).find('.shop_name').html(response.shop_name);
				$('.shop' + response.id).find('.shop_code').text(response.shop_code);
				$('.shop' + response.id).find('.shop_manager_name').text(response.shop_manager_name);
				$('.shop' + response.id).find('.shop_contact').text(response.shop_contact);
				$('.shop' + response.id).find('.address').text(response.address);
			}
		});
	});

	$('.modal-footer').on('click', '.delete', function() {
	
		$.ajax({
			type: 'post',
			url: "{{ url('/list/delete') }}",
			data: {
				'id': $('.did').text()
			},
			success: function(response) {
				$('#table').DataTable()
					.row( $('.shop' + response.id) )
					.remove()
					.draw();
			}
		});
	});

	function fillmodaluser(details){
		$('#fid').val(details[0]);
		$('#shop_name').val(details[1]);
		$('#shop_code').val(details[2]);
		$('#shop_manager_name').val(details[3]);
		$('#shop_contact').val(details[4]);
		$('#address').val(details[5]);
	}
</script>
 @endsection