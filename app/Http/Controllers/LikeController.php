<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Post;
use Auth;
class LikeController extends Controller
{
    public function index(Post $post)
    {
       return response()->json($post->likes()->with('user')->get());
    }

   /**
    * Favorite a particular post
    *
    * @param  Post $post
    * @return Response
    */
    public function likePost(Post $post)
    {
        $isLiked = Like::where('user_id', Auth::id())
        ->where('post_id', $post->id)
        ->first();

        if($isLiked) {
            Auth::user()->likes()->detach($post->id);
            return response (post::with('user','likes','comments.user')->orderBy('created_at','DESC')->get() )->header('Content_Type','deleted');


        }else{
            Auth::user()->likes()->attach($post->id);
            return response (post::with('user','likes','comments.user')->orderBy('created_at','DESC')->get() )->header('Content_Type','added');

        }
        
    }

    /**
     * Unfavorite a particular post
    *
    * @param  Post $post
    * @return Response
    */
    public function unlikePost(Post $post)
    {
        Auth::user()->likes()->detach($post->id);
        return post::with('user','likes','comments.user')->orderBy('created_at','DESC')->get();
      
    } 
    public function countPost(Post $post)
    {
        
        return 'good';
    } 
    
    public function showLikes(Post $post)
    {
        $likesOwners = $post->likes();
        dd($likesOwners);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
