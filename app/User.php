<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }


    public function address(){
        return $this->hasOne(Address::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
