@extends('layouts.dashboard')
@section('section')

@section('title')

	{{ $title }}

@endsection
@section('section')
	<!-- display restaurant list -->
	<div class = "container">
	@if (Session::has('message'))
   		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	</div>
	<div class="table-responsive text-center">	
		<table class="table" id="table">
			<thead>
				<tr>
					<th class="text-center">View Details</th>
					<th class="text-center">Mobile Number</th>
					<th class="text-center">First Name</th>
					<th class="text-center">Last Name</th>
					<th class="text-center">DOB</th>
					<th class="text-center">Profession</th>
					<th class="text-center">Location</th>
					<th class="text-center">Total Points</th>
				</tr>
			</thead>
			 @foreach($customers as $customer)
			<tr class="customer{{$customer->id}}">
				<td class="details"><button type="button" class="btn btn" style="background-color: #d9b310; color:#1d2731;" value="Details" onclick="window.location='{{url('report/customer',['id' => $customer->id])}}';" > View Details </button></td>
				<td class="mobile_number">{{$customer->mobile_number}}</td>
				<td class="last_name">{{$customer->first_name}}</td>
				<td class="last_name">{{$customer->last_name}}</td>
				<td class="dob">{{$customer->dob}}</td>
				<td class="profession">{{$customer->profession}}</td>
				<td class="location">{{$customer->location}}</td>
				<td class="total_point">{{$customer->points}}</td>
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