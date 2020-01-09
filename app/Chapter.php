<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['name', 'book_id',];
    public function bookName()
    {
        return $this->belongsTo('App\Book','book_id');
    }
}
