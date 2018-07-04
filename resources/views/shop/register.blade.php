@extends('layouts.dashboard')
@section('section')

@section('title')

	{{ $title }}

@endsection
<div class="container">
	<div class="container">
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
						<br />
						<form method="post" action="{{ url('shop/success') }}" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="shop_name">Shop Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('shop_name') ?: '' }}" id="shop_name" name="shop_name" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('shop_name'))
									<span class="help-block">{{ $errors->first('shop_name') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('shop_code') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="shop_code">Shop Code <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('shop_code') ?: '' }}" id="shop_code" name="shop_code" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('shop_code'))
									<span class="help-block">{{ $errors->first('shop_code') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('shop_manager_name') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="shop_manager_name">Shop Manager Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('shop_manager_name') ?: '' }}" id="shop_manager_name" name="shop_manager_name" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('shop_manager_name'))
									<span class="help-block">{{ $errors->first('shop_manager_name') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('shop_contact') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="shop_manager_name">Shop Contact <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('shop_contact') ?: '' }}" id="shop_contact" name="shop_contact" class="form-control col-md-7 col-xs-12" required = "required" ng-pattern="/^(?:\+88|01)?(?:\d{11}|\d{13})$/">
									@if ($errors->has('shop_contact'))
									<span class="help-block">{{ $errors->first('shop_contact') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Address<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('address') ?: '' }}" id="address" name="address" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('address'))
									<span class="help-block">{{ $errors->first('address') }}</span>
									@endif
								</div>
							</div>

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="hidden" name="_token" value="{{ Session::token() }}">
									<button type="submit" class="btn btn-success">Create restaurant</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop