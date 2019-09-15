<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * relacion entre tabla usuarios y tabla roles
     *  */ 
    public function role(){
        return $this->belongsTo('App\Role');

    }

    public function esAdmin(){

        if( $this->role->nombre_rol== 'Admin'){
            return true;

        }

    return false;


    }


    public function isOperator(){

        if( $this->role->nombre_rol== 'Operator'){
            return true;

        }

    return false;


    }
}
