<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    public $timestamps = false;
    public static $roles = []; //zeby nie łączyć sie za każdym razem z DB

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hours',
    ];
    protected $hidden = [
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Hour',['email']);
    }

    public function users()
    {
        return $this->hasOne('App\User');
    }

}
