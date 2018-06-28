<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{

	public $primaryKey = 'id';
   	protected $fillable = [
		'name',
		'description',
		'min_amount',
		'point',
		'offer_start'
		'offer_end',
		'merchant_id',
	];
}
