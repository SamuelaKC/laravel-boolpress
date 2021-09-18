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
        // dd($data); // dd= dump and die

        $request->validate([
        // 'titlePost' => 'sometimes|required', 
        // 'textPost' => 'sometimes|required', 
        // 'comment' => 'sometimes|required', 
        'image' => 'url',
        ]);
        $data = $request->all(); 

        $post = new Post(); 

        $this->fillAndSavePost($post, $data); 
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
    public function edit(Post $post)
    {
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
        return redirect()->route('home'); 

    }

    private function fillAndSavePost (Post $post, $data) {
        $post->titlePost = $data['titlePost']; 
        $post->textPost = $data['textPost']; 
        $post->etiquette = $data['etiquette']; 
        $post->comment = $data['comment']; 
        $post->image = $data['image']; 
        $post->read = key_exists('read', $data) ? true:false; 
        $post->save(); 
    }
}