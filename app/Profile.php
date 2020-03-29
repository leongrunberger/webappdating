<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'alter', 'beschreibung', 'user_id', 'song', 'wohnort', 'name', 'ogender', 'lgender'
    ];
}
