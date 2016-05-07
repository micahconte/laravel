<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','surname','email','phone','subscriber_id','custom1','custom2','custom3','custom4','custom5'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}