<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable =[
      'user_id',
      'status',
      'responder_id',
    ];
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function responder()
    {
        return $this->belongsTo('App\Models\User', 'responder_id');
    }
}
