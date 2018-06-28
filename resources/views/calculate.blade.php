@extends('layouts.dashboard')
@section('section')

<div class = "container">

	<p> Name: </p> 
	<br>
	<p> Mobile No: </p>
	<br>
	<p> Amount spent: </p> {{ $redeemcst->total_amount }}
	<br>
	<p> Points Received now: </p> {{ $redeemcst->point }}

@endsection