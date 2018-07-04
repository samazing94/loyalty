@extends('layouts.dashboard')
@section('section')

@section('title')

	{{ $title }}

@endsection
<div class="container">
	@if (Session::has('message'))
   		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
</div>
<div class = "container">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form method="POST" action="{{ url('customer/create') }}" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_number">Mobile No. <span class="required">*</span>
								</label> 
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('mobile_number') ?: '' }}" id="mobile_number" name="mobile_number" class="form-control col-md-7 col-xs-12" ng-pattern="/^(?:\+?88)?01[15-9]\d{8}$/" required>
									@if ($errors->has('mobile_number'))
									<span class="help-block">{{ $errors->first('mobile_number') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('firstname') ?: '' }}" id="firstname" name="firstname" class="form-control col-md-7 col-xs-12" required="required">
									@if ($errors->has('firstname'))
									<span class="help-block">{{ $errors->first('firstname') }}</span>
									@endif
								</div>
							</div>


							<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('lastname') ?: '' }}" id="lastname" name="lastname" class="form-control col-md-7 col-xs-12" required="required">
									@if ($errors->has('lastname'))
									<span class="help-block">{{ $errors->first('lastname') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
								<label for="dob" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label> 
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="dob" type="text" name="dob" value="" required="required" class="form-control" placeholder="MMYY">

								</div>
							</div>

							<div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Profession<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('profession') ?: '' }}" id="profession" name="profession" class="form-control col-md-7 col-xs-12" required="required">
									@if ($errors->has('profession'))
									<span class="help-block">{{ $errors->first('profession') }}</span>
									@endif
								</div>
							</div>


							<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Location<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('location') ?: '' }}" id="location" name="location" class="form-control col-md-7 col-xs-12" required="required">
									@if ($errors->has('location'))
									<span class="help-block">{{ $errors->first('location') }}</span>
									@endif
								</div>
							</div>

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="hidden" name="_token" value="{{ Session::token() }}">
									<button type="submit" class="btn btn-success">Sign up!</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
						