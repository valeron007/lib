<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author as author;

class AuthorController extends Controller
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
        $authors = author::all()->jsonSerialize();
//        var_dump($authors);
//        exit;
        return $authors;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if(!empty($request->post())){
            $author = new author();
            $author->name = $request->post('name');
            $createAuthor = $author->save();

            if ($createAuthor){
                return redirect()->route('main');
            }else{
                return view('author/create', array('error' => 'Not save author'));
            }
        }
        return view('author/create');
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
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id): \Illuminate\Http\Response
    {
        //
        if (!empty($request->post())){
            $author = author::find($id);

            $author->name = $request->post('name');
            $update = $author->save();
            if($update){
                return redirect()->route('main');
            }
            return json_encode(array('error' => 'Not save author'));
        }
        $author = author::find($id)->jsonSerialize();


        return view('author/edit', array('author' => $author));
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
        $author = author::find($id);
        $author_id = $author->delete();
        if ($author_id === true){
            return json_encode(array('success' => true));
        }

        return json_encode(array('error' => false));
    }
}
