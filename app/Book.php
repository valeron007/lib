<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'book';

    public function author(){
        return $this->belongsToMany('App\Author')->withPivot('name', 'id');
    }

}
