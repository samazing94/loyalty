@extends('layouts.dashboard')
@section('section')
	@if($userSession == 5)
		<h3>Hello Merchant </h3>
	@endif
	<div class="col-sm-12">
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-comments fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{$customers_of_shop}}</div>
							<div>Total Customers</div>
						</div>
					</div>
				</div>
				<a href="{{url ('/customer/index')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-tasks fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{$count_smslog}}</div>
							<div>Total SMS Logs</div>
						</div>
					</div>
				</div>
				<a href="{{url('/report/sms')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-shopping-cart fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{$count_pointoffer}}</div>
							<div>Total Offers</div>
						</div>
					</div>
				</div>
				<a href="{{url('offerlist/list')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-shopping-cart fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{$count_orders}}</div>
							<div>Total Orders</div>
						</div>
					</div>
				</div>
				<a href="{{url('orders/total_order')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-6">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-support fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{$c_off}}</div>
							<div>New Orders</div>
						</div>
					</div>
				</div>
				<a href="{{url('orders/new_list')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
	</div>
	@role('Merchantsadministrator')
	<div class="container">
	   <div class="table-responsive text-center">   
			<table class="table" id="table">
				<h3>Revenue</h3>
				<thead>
					<tr>
					
						<th class="text-center">Serial No.</th>
						<th class="text-center">Shop Name</th>
						<th class="text-center">Revenue</th>
						
					</tr>
				</thead>
				{{$i = NULL}}
				 @foreach($revenue as $rev)
				<tr class="rev{{$rev->id}}">
					<td class="id">{{++$i}}</td>
					<input type="hidden" id="fid" name="fid" value='{{$rev->id}}'>
					<td class="shop_id">{{$rev->shop_name}}</td>
					<td class="revenue">{{$rev->total_amounts}}</td>

			
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	@endrole
					<!-- /.panel -->
@endsection
