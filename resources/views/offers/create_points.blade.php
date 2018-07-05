@extends('layouts.dashboard')
@section('page_heading','Create Point Redeemers')
@section('section')
	<div class="">
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
						<br />
						<form method="post" action="{{ url('offerlist/successpt') }}" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control col-md-7 col-xs-12"  required = "required">
									@if ($errors->has('name'))
									<span class="help-block">{{ $errors->first('name') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('description') ?: '' }}" id="description" name="description" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('description'))
									<span class="help-block">{{ $errors->first('description') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('min_point') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="min_point">Min. Points <span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('min_point') ?: '' }}" id="min_point" name="min_point" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('min_point'))
									<span class="help-block">{{ $errors->first('min_point') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Amount<span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" value="{{ Request::old('amount') ?: '' }}" id="amount" name="amount" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('amount'))
									<span class="help-block">{{ $errors->first('amount') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('offer_start') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer_start">Offer Starts<span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="date" value="{{ Request::old('offer_start') ?: '' }}" id="offer_start" name="offer_start" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('offer_start'))
									<span class="help-block">{{ $errors->first('offer_start') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('offer_end') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer_end">Offer Ends<span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="date" value="{{ Request::old('offer_end') ?: '' }}" id="offer_end" name="offer_end" class="form-control col-md-7 col-xs-12" required = "required">
									@if ($errors->has('offer_end'))
									<span class="help-block">{{ $errors->first('offer_end') }}</span>
									@endif
								</div>
							</div>															

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="hidden" name="_token" value="{{ Session::token() }}">
									<button type="submit" class="btn btn-success">Create Offer</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
						