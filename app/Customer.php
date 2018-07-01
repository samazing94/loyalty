<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = 'customerinfo';
	public $primaryKey = 'id';
   	protected $fillable = [
		'mobile_number',
		'firstname',
		'lastname',
		'dob',
		'profession',
		'location',
	];
}
