@extends('layouts.dashboard')
@section('section')
<h3 class="text-center"> List of Orders </h3>
		<div class="table-responsive text-center container">	
			<table class="table" id="table">
				<thead>
					<tr>
						<th class="text-center">Serial No.</th>
						<th class="text-center">Shop ID</th>
						<th class="text-center">Total Orders</th>
						
					</tr>
				</thead>
				{{$i = NULL}}
				@foreach($total_orders as $total_order)
				<tr class="total_order{{$total_order->id}}">
					<td class="id">{{++$i}}</button></td>
					<input type="hidden" id="fid" name="fid" value='{{$total_order->id}}'>
					<td class="shop_id">{{$total_order->shop_name}}</td>
					<td class="total_orders">{{$total_order->total_cst}}</td>
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