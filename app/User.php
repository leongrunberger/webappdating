<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< Updated upstream
        'name', 'email', 'password','date', 'ogender', 'lgender','wohnort', 'beschreibung'
=======
        'name', 'avatar', 'email', 'password','date', 'ogender', 'lgender'
>>>>>>> Stashed changes
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

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function authorizeRoles(){

        if (is_array($roles)){
            return $this->hasAnyRole($roles) ||
             abort (401, 'This action is unauthorized.');
        }
       
        return $this->hasRole($roles) ||
             abort (401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles){

        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    public function hasRole($roles){

        return null !== $this->roles()->where('name', $roles)->first();
    }

    public function profiles(){
        return $this->hasMany(Profile::class);
    }
}
