<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
   // public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
