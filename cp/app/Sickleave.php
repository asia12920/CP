<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sickleave extends Model
{
    public $timestamps = false;
    public function users()
    {
        return $this->hasOne('App\User');
    }
}
