<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book as book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        //
        $books = DB::table('book')
            ->select('book.id', 'book.name', 'author.id as at_id', 'author.name as at_name')
            ->leftJoin('book_author', 'book_author.book_id','=', 'book.id')
            ->leftJoin('author', 'author.id', '=', 'book_author.author_id')
            ->get()
            ->jsonSerialize();

        $data = [];
        $result = [];
        foreach ($books as $book){
            $data[$book->id]['id'] = $book->id;
            $data[$book->id]['name'] = $book->name;
            $data[$book->id]['author_id'][] = $book->at_id;
            $data[$book->id]['at_name'][] = $book->at_name;
        }
        $res = array_merge($result, $data);

        return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
