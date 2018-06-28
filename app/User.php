<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model; 
use Zizaco\Entrust\Traits\EntrustUserTrait;
// use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    // use SoftDeletes, EntrustUserTrait {
    //     SoftDeletes::restore insteadof EntrustUserTrait;
    //     EntrustUserTrait::restore insteadof SoftDeletes;
    // }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
   // public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password', 'api_token', 'status', //'created_by', 'updated_by'
        //'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
