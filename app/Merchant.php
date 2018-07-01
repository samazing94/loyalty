<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Merchant extends Model
{
	public $table = 'merchant_info';
	public $primaryKey = 'id';
   	protected $fillable = [
		'merchant_name',
		'merchant_phone',
		'merchant_email',
		'merchant_status',
		'created_by',
		'updated_by',
	];
}
