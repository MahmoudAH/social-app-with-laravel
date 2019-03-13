<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\user;
use Auth;
use App\Http\Resources\PostCollection;

class TestController extends Controller
{
    public function getPosts(){
     
      // return response()->json(Post::all());     
       //$posts= Post::all();
       //dd($posts);*/
      // return new PostCollection(Post::all());
       $posts= Post::with('user')->
        whereIn('user_id', Auth::user()->friends()->pluck('friend_id'))->orWhere('user_id', Auth::id())->latest()->get();
     // $posts = json_decode($posts, true);
      //dd($posts);
      return response()->json($posts);
     // return view('test')->with('posts', $posts);
    }
    public function home_posts(){
         return Post::all();
    }
}
