<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name',];

//    public function chaptername()
//    {
//        return $this->hasMany('App\Chapter','book_id');
//    }
//    public function subrulename()
//    {
//        return $this->hasMany('App\SubRule','book_id');
//    }
}
