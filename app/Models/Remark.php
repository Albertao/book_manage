<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    //
    protected $table = "remark";

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
