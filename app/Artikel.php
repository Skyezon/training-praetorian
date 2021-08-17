<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Artikel extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'author','image','user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function commentUsers(){
        return $this->belongsToMany('App\User','comments')->withPivot('comments');
    }

}
