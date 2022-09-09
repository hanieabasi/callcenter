<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
