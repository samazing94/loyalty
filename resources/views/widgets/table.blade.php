<table class="table {{ $class }}" id="table">
	<thead>
		<tr>
			<th class="text-center">Serial No.</th>
			<th class="text-center">Shop Name</th>
			<th class="text-center">Shop Code</th>
			<th class="text-center">Shop Manager Name</th>
			<th class="text-center">Shop Contact</th>
			<th class="text-center">Address</th>
			<th class="text-center">Actions</th>
		</tr>
	</thead>
	{{$i = NULL}}
	@foreach($shops as $shop)
		<tr class="shop{{$shop->id}}">
			<td class="id">{{++$i}}</td>
			<input type="hidden" id="fid" name="fid" value='{{$shop->id}}'>
			<td class="shop_name">{{$shop->shop_name}}</td>
			<td class="shop_code">{{$shop->shop_code}}</td>
			<td class="shop_manager_name">{{$shop->shop_manager_name}}</td>
			<td class="shop_contact">{{$shop->shop_contact}}</td>
			<td class="address">{{$shop->address}}</td>
			<td>
				<button class="edit-modal btn btn-info" value="{{$shop->id}},{{$shop->shop_name}}, {{$shop->shop_code}}, {{$shop->shop_manager_name}},{{$shop->shop_contact}},{{$shop->address}}">
					<span class="glyphicon glyphicon-edit"></span> Edit
				</button>
				<button class="delete-modal btn btn-danger" value="{{$shop->id}},{{$shop->shop_name}}">
					<span class="glyphicon glyphicon-trash"></span> Delete
				</button>
			</td>
		</tr>
	@endforeach
</table>
