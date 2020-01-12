<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubRule extends Model
{
    protected $fillable = ['name','book_id','chap_id','rule_id','image','desc'];
    public function bookName()
    {
        return $this->belongsTo('App\Book','book_id');
    }
    public function chapName()
    {
        return $this->belongsTo('App\Chapter');
    }
    public function ruleName()
    {
        return $this->hasMany('App\Rule','id');
    }
}
