@extends('layouts.dashboard')
@section('section')

<div class="">
	<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p>Failed to register restaurant </p>
				<br>
				<a href= " {{url ('shop/register')}}" > Click here to try again </a>				
			</div>
		</div>
	</div>
</div>
@stop