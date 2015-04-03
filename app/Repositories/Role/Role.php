<?php namespace App\Repositories\Role;

use Illuminate\Database\Eloquent\Model;

class Role extends Model implements RoleInterface{

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
