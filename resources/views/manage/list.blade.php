@extends('layout')

@section('title')

	{{ $title }}

@endsection

@section('content')

	<!-- display user list -->
	<div class="table-responsive text-center">
		<table class="table table-borderless" id="table">

			<thead>
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Name</th>
					<th class="text-center">HotKey</th>
					<th class="text-center">SubHotKey</th>
					<th class="text-center">Address</th>
					<th class="text-center">Phone</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>

			@foreach($restaurants as $restaurant)

			<tr class="restaurant{{$restaurant->id}}">
				<td>{{$restaurant->id}}</td>
				<td class="name">{{$restaurant->name}}</td>
				<td class="hotkey">{{$restaurant->hotkey}}</td>
				<td class="subhotkey">{{$restaurant->subhotkey}}</td>
				<td class="address">{{$restaurant->address}}</td>
				<td class="phone">{{$restaurant->phone}}</td>
			</tr>

			@endforeach

		</table>
	</div>

	<!-- modal content -->
	

@endsection

//@section('script')
<script>
var editor; // use a global for the submit and return data rendering in the examples
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor({
        ajax: "{{ url('/manage/update) }}",
        table: "#example",
        fields: [ 
        	{
                label: "Name:",
                name: "name"
            }, 
            {
                label: "Hotkey:",
                name: "hotkey"
            }, 
            {
                label: "SubHotkey:",
                name: "subhotkey"
            }, 
            {
                label: "Address:",
                name: "address"
            }, 
            {
                label: "Phone:",
                name: "phone"
            }
        ]
    });
 
   $('#table').DataTable({
		dom: 'Bfrtip',
        ajax: "{{url('/manage/update)}}",
        columns: [
            { 
            	data: null, render: function ( data, type, row ) 
            	{
               		// Combine the first and last names into a single table field
                	return data.name;
            	} 
        	},
            { data: "hotkey" },
            { data: "subhotkey" },
            { data: "address" },
            { data: "phone" }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    });
});
</script>
@endsection