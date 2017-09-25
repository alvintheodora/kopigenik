<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    public function transactions(){
    	return $this->belongsToMany(Transaction::class);
    }
}
