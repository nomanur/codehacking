<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Photo;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        

        $posts = Post::paginate(2);
        

        //$img =  preg_match('/(<img[^>]+>)/i', $posts, $matches);

        $categories = Category::all();
        return view('front/home', compact('posts', 'categories'));
    }

     public function post($id)
    {

        $post = Post::findOrFail($id);
        $categories = Category::all();

        $comments = $post->comments()->whereIsActive(1)->get();



        return view('post', compact('post', 'comments', 'categories'));
    }

    public function search(Request $request)
    {
         $query = $request->input('search');

         $posts = Post::where('title', 'LIKE', '%' . $query . '%')->orWhere('body', 'LIKE', '%'.$query.'%')->get();

        return view('search.search', compact('query', 'posts'));


    }
}
