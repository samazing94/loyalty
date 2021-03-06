@extends('layouts.dashboard')
@section('section')
<div class="container">
		<h2> Details </h2>
		<div class="clearfix"></div>
		<div class="table-responsive text-center">	
		<table class="table" id="table">
			<thead> 
				<tr>
					<th class="text-center">Serial</th>
					<th class="text-center">Mobile Number</th>
					<th class="text-center">First Name</th>
					<th class="text-center">Last Name</th>
					<th class="text-center">DOB</th>
					<th class="text-center">Profession</th>
					<th class="text-center">Location</th>
					<th class="text-center">Points</th>
				</tr>
			</thead>
			 {{$i = NULL}}
			 @foreach($customer as $cst)
				<tr class="customer{{$cst->id}}">
				<td class="id"> {{++$i}}</td>
				<input type="hidden" id="fid" name="fid" value='{{$cst->id}}'>
				<td class="mobile_number">{{$cst->mobile_number}}</td>
				<td class="first_name">{{$cst->first_name}}</td>
				<td class="last_name">{{$cst->last_name}}</td>
				<td class="dob">{{$cst->dob}}</td>
				<td class="profession">{{$cst->profession}}</td>
				<td class="location">{{$cst->location}}</td>
				<td class="total_point">{{$cst->point}}</td>
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
	            'colvis'

	        ]
		});

    });
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
		}
	});
</script>
 @endsection