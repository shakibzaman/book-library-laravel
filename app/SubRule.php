<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubRule extends Model
{
    protected $fillable = ['name','book_id','chap_id','rule_id','image','desc'];
}
