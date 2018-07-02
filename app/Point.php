<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{

	protected $table = 'point_rule';
	public $primaryKey = 'id';
   	protected $fillable = [
		'name',
		'description',
		'min_amount',
		'point',
		'offer_start',
		'offer_end',
		'merchant_id',
	];
}
