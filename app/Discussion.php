<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //
    protected $fillable = ['title','body','user_id','last_user_id'];

    public function user(){
        //一个discussion属于一个user，默认外键是user_id
       return $this->belongsTo(User::class,'user_id');
    }
}
