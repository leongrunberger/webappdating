<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = [
        'user_id', 'liked_user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function like() {
        return $this->belongsTo('App\User');
    }
}
