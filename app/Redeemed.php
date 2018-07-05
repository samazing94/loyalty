<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redeemed extends Model
{

	protected $table = 'point_rule_redeem';
	public $primaryKey = 'id';
   	protected $fillable = [
		'name',
		'description',
		'min_point',
		'amount',
		'offer_start',
		'offer_end',
		'merchant_id',
	];
}
