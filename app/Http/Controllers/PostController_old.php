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

    $this->fillAndSavePost($post, $data); 
    /*
    $post->titlePost = $data['titlePost']; 
    $post->textPost = $data['textPost']; 
    $post->etiquette = $data['etiquette']; 
    $post->comment = $data['comment']; 
    $post->image = $data['image']; 
    $post->read = key_exists('read', $data) ? true:false; 
    $post->save(); 
    // dd('ho fatto'); 
*/


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
    public function edit(Post $post) //prima c'era $id, riceve un id che cerca di trasformare in un oggetto e la trasformazione va a leggere direttamente dal db
    {
        /*
        creare la form
        dal controller passare l'oggetto alla form
        la forma mostra al posto dei vari value input il valore relativo all'oggetto
        il pulsante submit porterà  al controllor update 
        e l'update aggiorna l'oggetto e lo salva*/
//dd($post); 


return view('posts.edit', compact('post'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {


        $data = $request->all(); 
        /*
        $data['read'] = key_exists('read', $data) ? true:false; 
        $post->update($data); 
*/
    $this->fillAndSavePost($post, $data); 
/*
            $post->titlePost = $data['titlePost']; 
    $post->textPost = $data['textPost']; 
    $post->etiquette = $data['etiquette']; 
    $post->comment = $data['comment']; 
    $post->image = $data['image']; 
    $post->read = key_exists('read', $data) ? true:false; 
*/

    /*

        unset($data['_token']); 
        unset($data['_method']);
        dump($data); 

        // $post->update($data);  questa è sbagliata va bene solo se dall'input partone i dargi giusti update  =fill + save

        $post->fill($data); //formula corretta si usa il fill al posto dell'update fill fa solo fill, attenzione poi si deve modificare il dile in https ad esempio post da compilare con i campi che deve compilare

        dump($post); 

        */

        return redirect()->route('posts.show', $post); 
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete(); 
        return redirect()->route('posts.show'); 

    }

    private function fillAndSavePost ($post, $data) {
    $post->titlePost = $data['titlePost']; 
    $post->textPost = $data['textPost']; 
    $post->etiquette = $data['etiquette']; 
    $post->comment = $data['comment']; 
    $post->image = $data['image']; 
    $post->read = key_exists('read', $data) ? true:false; 
    $post->save(); 
    }
}