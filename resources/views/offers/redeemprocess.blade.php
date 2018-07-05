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
						<form method="post" onsubmit = "tosubmit()" action="{{ url('offerlist/redeem_calculate') }}" data-parsley-validate class="form-horizontal form-label-left">
							<div class ="form-group">
								<label  class="control-label col-md-3 col-sm-3 col-xs-12" for="sel1">Select restaurant list:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" id="name" name="name">
										@foreach($shops as $shop)
									    <option value= "{{$shop->shop_name}}" >{{$shop->shop_name}}</option>
									    @endforeach
									</select>
									<script type="text/javascript">
						   					function setTextField(ddl) {
						        				document.getElementById('name').value = ddl.options[ddl.selectedIndex].text;
						    			}
									</script>
								</div>
							</div>

							<div class ="form-group">
								<label  class="control-label col-md-3 col-sm-3 col-xs-12" for="sel1">Select list:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" id="name1" name="name1">
										@foreach($points as $point)
									    <option value= "{{$point->name}}" >{{$point->name}}</option>
									    @endforeach
									</select>
									<script type="text/javascript">
						   					function setTextField(ddl) {
						        				document.getElementById('name1').value = ddl.options[ddl.selectedIndex].text;
						    			}
									</script>
								</div>
							</div>

							<div class="form-group">
								
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_number">Phone No. <span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ Request::old('customers') ?: '' }}" id="mobile_number" name="mobile_number" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('customers'))
									<span class="help-block">{{ $errors->first('customers') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('redeem_points') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="redeem_points">Points to Use <span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" value="" id="redeem_points" name="redeem_points" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('redeem_points'))
									<span class="help-block">{{ $errors->first('redeem_points') }}</span>
									@endif
								</div>
							</div>		
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
