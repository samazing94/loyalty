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
						<form method="post" action="{{ url('offerlist/calculate') }}" data-parsley-validate class="form-horizontal form-label-left">
							<div class ="form-group">
								<label  class="control-label col-md-3 col-sm-3 col-xs-12" for="sel1">Select restaurant list:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" id="name" name="name">
										@foreach($shops as $shop)
									    <option value= "{{$shop->id}}" >{{$shop->shop_name}}</option>
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
									    <option value= "{{$point->id}}" >{{$point->name}}</option>
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

							<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Amount <span class="required"><span style="color:red;">*</span></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" value="" id="amount" name="amount" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('amount'))
									<span class="help-block">{{ $errors->first('amount') }}</span>
									@endif
								</div>

							</div>

								<label class="details" style="margin-left:21.3em;" class="control-label col-md-3 col-sm-3 col-xs-12" for="details">You have <span class="points">0</span> points which converts to <span class="saved_amount"> 0 </span> TK
								</label><div id="details"></div>
							
							<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
								<label class="control-label col-md-6 col-sm-6 col-xs-12" style="margin-left:-2.7em;" for="amount">Do you wish to use this points?</label>
								<span class ="points_cst" value = "{{$point->point}}" hidden>{{$point->point}}</span>
								<span class ="min_amount" value = "{{$point->min_amount}}" hidden>{{$point->min_amount}}</span>
								<div class="col-md-5 col-sm-6 col-xs-12">
									<input type="radio" name="action" value="yes" required> Yes
  									<input type="radio" name="action" value="no" required> No<br>
  									<div id = "response"></div>
									<!-- radio buttons yes/no -->
								</div>
							</div>

							<div class="ln_solid"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input id = "csrf" type="hidden" name="_token" value="{{ Session::token() }}">
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div> 	
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
    $('#amount').on('change', function() {
            var amount=$(this).val();
            var csrftoken = $("#csrf").val();
            var name = $('#name1').val();
            
            var mobile_number = $('#mobile_number').val();
                $.getJSON('{{ url('process') }}?amount='+amount+'&_token='+csrftoken+'&name='+name+'&mobile_number='+mobile_number, function (data) {
                	//obj = jQuery.parseJSON(JSON.stringify(data));
					var saved_amount;		
					var points;
					name = data.name;
					points = data.points;
					//amount = data.amount;
					saved_amount = data.saved_amount;
					//alert(data.name + " " + data.points + " " + data.amount);
                	//$(".details .taka").html(amount);
					$(".details .points").html(points);
					$(".details .saved_amount").html(saved_amount);
                });
        });
        
  });   

	// $(document).ready(function () {
	// 	var points = $(".points_cst").text();
	// 	var min_amount = $(".min_amount").text();
	// 	var amount = $(this).val();
	// 	var csrf = $("#csrf").val();
	// 	$('input[name=amount]').change( function() {
			
	// 		$.ajax({
	// 			type: 'post',
	// 			url: "{{ url('process') }}",
	// 			data: 
	// 			{
	// 				'csrf' : csrf,
	// 				'amount' : amount,
					
	// 			},
	// 		});	
			
			// var taka   = $(this).val();
			// var s_amount = amount / min_amount;
			// var g_point = points * s_amount
			// var saved  = s_amount * points;
		
			// $(".details .taka").html(amount);
			// $(".details .points").html(s_amount);
			// $(".details .saved").html(saved);

		// show that something is loading
        // $('#response').html("<b>Loading response...</b>");
         
        // /*
        //  * 'post_receiver.php' - where you will pass the form data
        //  * $(this).serialize() - to easily read form data
        //  * function(data){... - data contains the response from post_receiver.php
        //  */
        // $.post('{{ url('post_receiver') }}', { Amount: amount }, function(data){
        //      console.log(data);
        //     // show the response
        //     $('#response').html(data);
        //     //alert(data);

             
        // }).fail(function() {
         
        //     // just in case posting your form failed
        //     alert( "Posting failed." );
             
        // });
 
        // // to prevent refreshing the whole page page
        // return false;
	// 	});
	// });
</script>
@endsection
