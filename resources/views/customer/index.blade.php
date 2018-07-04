@extends('layouts.dashboard')
@section('section')

@section('title')

	{{ $title }}

@endsection
@section('section')
	<!-- display restaurant list -->
<div class ="container">
	<div class="table-responsive text-center">	
		<table class="table" id="table">
			<thead>
				<tr>
					<th class="text-center">Serial No.</th>
					<th class="text-center">Mobile Number</th>
					<th class="text-center">First Name</th>
					<th class="text-center">Last Name</th>
					<th class="text-center">DOB</th>
					<th class="text-center">Profession</th>
					<th class="text-center">Location</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			{{$i = NULL}}
			 @foreach($customers as $customer)
			<tr class="customer{{$customer->id}}">
				<td class="id">{{++$i}}</td>
				<input type="hidden" id="fid" name="fid" value='{{$customer->id}}'>
				<td class="mobile_number">{{$customer->mobile_number}}</td>
				<td class="first_name">{{$customer->first_name}}</td>
				<td class="last_name">{{$customer->last_name}}</td>
				<td class="dob">{{$customer->dob}}</td>
				<td class="profession">{{$customer->profession}}</td>
				<td class="location">{{$customer->location}}</td>
				<td>
					<button class="edit-modal btn btn-info" value="{{$customer->id}},{{$customer->mobile_number}},{{$customer->first_name}}, {{$customer->last_name}}, {{$customer->dob}},{{$customer->profession}},{{$customer->location}}">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</button>
					<button class="delete-modal btn btn-danger" value="{{$customer->id}},{{$customer->first_name}}">
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
							<label class="control-label col-sm-2" for="mobile_number">Mobile No.</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="mobile_number" ng-pattern="/^(?:\+88|01)?(?:\d{11}|\d{13})$/">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="first_name">First Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="first_name">
							</div>
						</div>
						  <div class="form-group">
							<label class="control-label col-sm-2" for="last_name">Last Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="last_name">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="dob">DOB</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="dob">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="profession">Profession</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="profession">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="Location">Location</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="location">
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
			url: "{{ url('/customer/update') }}",
			data: {
				'id'  : $('#fid').val(),
				'mobile_number': $('#mobile_number').val(),
				'first_name': $('#first_name').val(),
				'last_name': $('#last_name').val(),
				'dob': $('#dob').val(),
				'profession': $('#profession').val(),
				'location': $('#location').val(),
			},
			success: function(response) {
				$('.customer' + response.id).find('.mobile_number').html(response.mobile_number);
				$('.customer' + response.id).find('.first_name').html(response.first_name);
				$('.customer' + response.id).find('.last_name').text(response.last_name);
				$('.customer' + response.id).find('.dob').text(response.dob);
				$('.customer' + response.id).find('.profession').text(response.profession);
				$('.customer' + response.id).find('.location').text(response.location);
			}
		});
	});

	$('.modal-footer').on('click', '.delete', function() {
	
		$.ajax({
			type: 'post',
			url: "{{ url('/customer/delete') }}",
			data: {
				'id': $('.did').text()
			},
			success: function(response) {
				$('#table').DataTable()
					.row( $('.customer' + response.id) )
					.remove()
					.draw();
			}
		});
	});

	function fillmodaluser(details){
		$('#fid').val(details[0]);
		$('#mobile_number').val(details[1]);
		$('#first_name').val(details[2]);
		$('#last_name').val(details[3]);
		$('#dob').val(details[4]);
		$('#profession').val(details[5]);
		$('#location').val(details[6]);
	}
</script>
 @endsection