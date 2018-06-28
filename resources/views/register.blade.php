@extends('layouts.dashboard')
@section('page_heading','Restaurant Registration')
@section('section')
@section('title')

	{{ $title }}

@endsection
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form method="post" action="{{ url('restaurant/create') }}" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('restaurant') ?: '' }}" id="name" name="name" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('restaurants'))
									<span class="help-block">{{ $errors->first('restaurants') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('hotkey') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hotkey">Hotkey <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('hotkey') ?: '' }}" id="hotkey" name="hotkey" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('hotkey'))
									<span class="help-block">{{ $errors->first('hotkey') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('subhotkey') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">SubHotkey <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('subhotkey') ?: '' }}" id="subhotkey" name="subhotkey" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('subhotkey'))
									<span class="help-block">{{ $errors->first('subhotkey') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Address<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('address') ?: '' }}" id="address" name="address" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('address'))
									<span class="help-block">{{ $errors->first('address') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Phone No.<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('phone') ?: '' }}" id="phone" name="phone" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('phone'))
									<span class="help-block">{{ $errors->first('phone') }}</span>
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
						