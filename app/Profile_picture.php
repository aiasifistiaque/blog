<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_picture extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
