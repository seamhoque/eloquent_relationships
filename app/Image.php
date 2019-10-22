<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name','imageable_id','imageable_type'];

    public function imageable(){
        return $this->morphTo();
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
    public function tags(){
        return $this->morphToMany('App\Tag','tagable');
    }

}
