<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id','address'];

    public function user(){

        return $this->belongsTo('App\User');
    }

}
