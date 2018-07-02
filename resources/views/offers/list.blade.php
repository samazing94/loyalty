@extends('layouts.dashboard')
@section('section')
	<div class="table-responsive text-center container">	
		<table class="table" id="table">
			<thead>
				<tr>
					<th class="text-center">Serial No.</th>
					<th class="text-center">Offer Name</th>
					<th class="text-center">Minimum Amount</th>
					<th class="text-center">Points</th>
					<th class="text-center">Merchant ID </th>
					<th class="text-center">Offer Start</th>
					<th class="text-center">Offer End</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			 {{$i = NULL}}
			 @foreach($orders as $order)
			<tr class="order{{$order->id}}">
				<td class="fid">{{++$i}}</button></td>
				<td class="name">{{$order->name}}</td>
				<td class="min_amount">{{$order->min_amount}}</td>
				<td class="point">{{$order->point}}</td>
				<td class="merchant_id">{{$order->merchant_id}}</td>
				<td class="offer_start">{{$order->offer_start}}</td>
				<td class="offer_end">{{$order->offer_end}}</td>
				<td>
					<button class="edit-modal btn btn-info" value="{{$order->id}},{{$order->name}}, {{$order->min_amount}}, {{$order->point}},{{$order->merchant_id}},{{$order->offer_start}}, {{$order->offer_end}}">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</button>
					<button class="delete-modal btn btn-danger" value="{{$order->id}},{{$order->name}}">
						<span class="glyphicon glyphicon-trash"></span> Delete
					</button>
				</td>
			</tr>
			@endforeach
		</table>
	</div>	

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
								<label class="control-label col-sm-2" for="name">Offer Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name">
								</div>
							</div>
							  <div class="form-group">
								<label class="control-label col-sm-2" for="shop_code">Minimum Amount</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="min_amount">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="point">Points</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="point">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="merchant_id">Merchant ID</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="merchant_id" disabled>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="offer_start">Offer Starts</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="offer_start">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-2" for="address">Offer Ends</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="offer_end">
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
			url: "{{ url('/offerlist/update') }}",
			data: {
				'id'  : $('#fid').val(),
				'name': $('#name').val(),
				'min_amount': $('#min_amount').val(),
				'point': $('#point').val(),
				'merchant_id': $('#merchant_id').val(),
				'offer_start': $('#offer_start').val(),
				'offer_end': $('#offer_end').val(),
			},
			success: function(response) {
				$('.order' + response.id).find('.name').html(response.name);
				$('.order' + response.id).find('.min_amount').text(response.min_amount);
				$('.order' + response.id).find('.point').text(response.point);
				$('.order' + response.id).find('.merchant_id').text(response.merchant_id);
				$('.order' + response.id).find('.offer_start').text(response.offer_start);
				$('.order' + response.id).find('.offer_end').text(response.offer_end);
			}
		});
	});

	$('.modal-footer').on('click', '.delete', function() {
	
		$.ajax({
			type: 'post',
			url: "{{ url('/offerlist/delete') }}",
			data: {
				'id': $('.did').text()
			},
			success: function(response) {
				$('#table').DataTable()
					.row( $('.order' + response.id) )
					.remove()
					.draw();
			}
		});
	});

	function fillmodaluser(details){
		$('#fid').val(details[0]);
		$('#name').val(details[1]);
		$('#min_amount').val(details[2]);
		$('#point').val(details[3]);
		$('#merchant_id').val(details[4]);
		$('#offer_start').val(details[5]);
		$('#offer_end').val(details[6]);
	}
</script>
 @endsection