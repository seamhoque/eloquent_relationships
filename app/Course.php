<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'name'];

    public function users(){
        return $this->belongsToMany('App\User','course_users');
    }
}
