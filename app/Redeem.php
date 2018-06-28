<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{
	protected $table = 'shop_redeemed';
    public $primaryKey = 'id';
   	protected $fillable = [
		'point_rule_id',
		'shop_id',
		'customerinfo_id',
		'total_amount',
		'point'
		'updated_by',
	];
}
