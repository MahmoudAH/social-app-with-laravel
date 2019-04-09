<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Auth;
use DB;
class VueController extends Controller
{
/*
    public function postAuth(Request $request)
    {
      
        switch ($request->input('content')) {
          case 'form1':
          $this->store(); 
          break;

          case 'form2':
          $this->store2();
          break;

      }  
    }
*/
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'max:255',
        'content' => 'required',
      ]);

      $user = Auth::user();

      $post = $user->posts()->create([
        'content' => $request->content,
        'published' => $request->has('published')
      ]);
      $post = post::where('id', $post->id)->with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();

      broadcast(new NewPost($post))->toOthers();

      return post::with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();
     // return response()->json($post);
    }

    
}
