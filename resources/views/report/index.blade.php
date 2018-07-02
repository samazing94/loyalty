@extends('layouts.dashboard')
@section('section')

<div class="container">
	<div class = "container">
	@if (Session::has('message'))
   		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<a href = "{{url ('/report/customer')}}"><h2>List of Customers</h2></a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
