<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
use App\Events\NewComment;

class RealTimeController extends Controller
{
     public function store(Request $request, Post $post)
      {
        $comment = $post->comments()->create([
          'body' => $request->body,
          'user_id' => Auth::id()
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();
        broadcast(new NewComment($comment))->toOthers();
        /*return post::with('user','likes','comments.user')
            ->orderBy('created_at','DESC')->get();*/
        return $comment->toJson();
      }
}
