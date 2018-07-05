@extends('layouts.dashboard')
@section('section')

<div class = "container">
	<br>
	<p> Name: {{ $customers->first_name }}</p> 
	<p> Mobile No: {{ $customers->mobile_number }} </p>
	<p> Points spent:  {{ $redeemcst->total_amount }} </p>
	<p> Amount saved: {{ $redeemcst->point }} </p>
	<br>
@endsection