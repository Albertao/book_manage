<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = "book";

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function booked_user(){
        return $this->hasOne('App\User', 'id', 'booked_user_id');
    }

}
