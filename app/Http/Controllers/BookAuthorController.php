<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BookAuthor as bookAuthor;

class BookAuthorController extends Controller
{
    //
    public function create(){

    }

    public function destroy($id, $authors_id){
        echo "111";
        exit;
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        //
    }

}
