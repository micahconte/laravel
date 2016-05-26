<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address','city','state','zip'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
