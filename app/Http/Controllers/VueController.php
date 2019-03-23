<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Auth;
use DB;
class VueController extends Controller
{
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
      return post::with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();
     // return response()->json($post);
    }
}
