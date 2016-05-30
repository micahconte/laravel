<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = ['user_id','role_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function role()
    {
    	return $this->hasOne(Role::class);
    }
}
