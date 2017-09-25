<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function coffees(){
    	return $this->belongsToMany(Coffee::class);
    }
}
