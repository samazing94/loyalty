@extends('layouts.dashboard')
@section('section')
<h3 class="text-center"> New Orders </h3>
		<div class="table-responsive text-center container">	
			<table class="table" id="table">
				<thead>
					<tr>
						<th class="text-center">Serial No.</th>
						<th class="text-center">Customer Name</th>
						<th class="text-center">Shop Name</th>
						<th class="text-center">Points Acquired</th>
						<th class="text-center">Total Amount</th>
						<th class="text-center">Date</th>
					
					</tr>
				</thead>
				{{$i = NULL}}
				@foreach($newoffers as $newoffer)
				<tr class="newoffer{{$newoffer->id}}">
					<td class="id">{{++$i}}</button></td>
					<input type="hidden" id="fid" name="fid" value='{{$newoffer->id}}'>
					<td class="cst_id">{{$newoffer->first_name}} {{$newoffer->last_name}}</td>
					<td class="shop_id">{{$newoffer->shop_name}}</td>
					<td class="point">{{$newoffer->point}}</td>
					<td class="total_amount">{{$newoffer->total_amount}}</td>
					<td class="created_at">{{$newoffer->created_at}}</td>
				</tr>
				@endforeach
			</table>
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

	        ],
		});

    });
   
</script>
 @endsection