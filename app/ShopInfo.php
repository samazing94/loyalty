<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
	protected $table = 'shop_info';
   // public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'shop_name', 'shop_code', 'shop_manager_name', 'shop_contact', 'address', 'status', //'created_by', 'updated_by'
        //'name',
    ];
}
