<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'author';

    public function book(){
        return $this->belongsToMany('App\Book', 'book_author', 'book_id', 'author_id');
    }
}
