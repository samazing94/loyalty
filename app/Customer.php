<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
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
