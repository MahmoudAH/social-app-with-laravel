<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
use App\Events\NewComment;
use App\Events\NewLike;

class CommentController extends Controller
{
  public function index(Post $post)
  {
    return response()->json($post->comments()->with('user')->latest()->get());
  }

  public function store(Request $request, Post $post)
  {
    $comment = $post->comments()->create([
      'body' => $request->body,
      'user_id' => Auth::id()
    ]);

   
    /*$post = post::with('user','likes','comments.user')
        ->orderBy('created_at','DESC')->get();*/

    broadcast(new NewLike($post))->toOthers();

    return post::with('user','likes','comments.user')
        ->orderBy('created_at','DESC')->get();
    //return $comment->toJson();
  }
  
}
