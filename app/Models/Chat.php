<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    protected $table = "chat";

    public function from(){
        return $this->hasOne('App\User', 'id', 'from');
    }

    public function to(){
        return $this->hasOne('App\User', 'id', 'to');
    }
}
