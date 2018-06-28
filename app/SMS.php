<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
	protected $table = 'smslog'
	public $primaryKey = 'id';
	protected $fillable = [
		'hotkey',
		'msisdn',
		'sms_body',
		'status',
		'reply_body',
	];
}
