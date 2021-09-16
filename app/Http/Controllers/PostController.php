<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Psy\Command\DumpCommand;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts = Post::all(); 
        // dump($allPosts); 

        return view('posts.index', compact('allPosts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create'); 
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

        // dd($request); // dd= dump and die

        $request->validate([
            'titlePost' => 'required|unique:posts|max:500',
            'textPost' => 'required|unique:posts|min:50',
            'image' => 'url',
        ]);
    $data = $request->all(); 
/*
    if(key_exists('read', $data)) {
            $read = true; 
        } else {
            $read = false; 
        }

        */

    $post = new Post(); 
    $post->titlePost = $data['titlePost']; 
    $post->textPost = $data['textPost']; 
    $post->etiquette = $data['etiquette']; 
    $post->comment = $data['comment']; 
    $post->image = $data['image']; 
    $post->read = key_exists('read', $data) ? true:false; 
    $post->save(); 
    // dd('ho fatto'); 



    return redirect()->route('posts.show', $post->id); 
        

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
        // dump($id); 
        $post = Post::find($id); 
        // dump($post); 
        return view('posts.show', compact('post')); 
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