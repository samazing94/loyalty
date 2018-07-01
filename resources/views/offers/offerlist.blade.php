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
						<br />
						<form method="post" onsubmit = "tosubmit()" action="{{ url('offerlist/calculate') }}" data-parsley-validate class="form-horizontal form-label-left">
							<div class ="form-group">
								<label  class="control-label col-md-3 col-sm-3 col-xs-12" for="sel1">Select list:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" id="name" name="name">
									    <option value= "LoyalPow" >Loyal Pow</option>
									    <option value="BuffetFiesta">Buffet Fiesta</option>
									</select>
									<script type="text/javascript">
						   					function setTextField(ddl) {
						        				document.getElementById('name').value = ddl.options[ddl.selectedIndex].text;
						    			}
									</script>
								</div>
							</div>

							<div class="form-group">
								
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_number">Phone No. <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('customers') ?: '' }}" id="mobile_number" name="mobile_number" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('customers'))
									<span class="help-block">{{ $errors->first('customers') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Amount <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" value="" id="amount" name="amount" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('amount'))
									<span class="help-block">{{ $errors->first('amount') }}</span>
									@endif
								</div>
							</div>

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="hidden" name="_token" value="{{ Session::token() }}">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
