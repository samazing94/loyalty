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
					<th class="text-center">Serial No.</th>
					<th class="text-center">Hot Key</th>
					<th class="text-center">Sub Hot Key</th>
					<th class="text-center">MSISDN</th>
					<th class="text-center">SMS Body</th>
					<th class="text-center">Status</th>
					<th class="text-center">Reply Body</th>
					<th class="text-center">Created At</th>
				</tr>
			</thead>
			 {{$i = NULL}}
			 @foreach($smslog as $sms)
			 
			<tr class="sms{{$sms->id}}">
				<td class="fid">{{++$i}}</button></td>
				<td class="mobile_number">{{$sms->hotkey}}</td>
				<td class="subhotkey">{{$sms->subhotkey}}</td>
				<td class="last_name">{{$sms->msisdn}}</td>
				<td class="last_name">{{$sms->sms_body}}</td>
				<td class="dob"><?php 
				if ($sms->status == 1)
					echo "Successful";
				else 
					echo "Unsuccessful";
					?>
					</td>
				<td class="profession">{{$sms->reply_body}}</td>
				<td class="location">{{$sms->created_at}}</td>
				
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