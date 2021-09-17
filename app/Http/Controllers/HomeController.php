<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Post; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    { 
        
        $user = Auth::user(); 
        if(empty($user)) {

            // return 'Devi fare il login'; 
        $allPosts = Post::orderBy('id', 'DESC')->get();
        return view('home', compact('allPosts')); 
        } else {

        //$allPosts = Post::all(); 
        $allPosts = Post::orderBy('id', 'DESC')->get();

        return view('home', compact('allPosts')); 
        }

    }

        //     public function private() 
    // { 
    //     /*
    //     if(!Auth::check()){
    //         return redirect()->route('login'); 
    //     }
    //     */
    // //     $user = Auth::user(); 
    // //     if(empty($user)) {
            
    // //         return 'Devi fare il login'; 

    // //     } else {

    // //     $allPosts = Post::all(); 

    // //     return view('home', compact('allPosts')); 
    // //     }

    // }

}