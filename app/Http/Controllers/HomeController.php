<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Auth;
use Alert;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();

        //get friends post only
/*
        $posts = Post::with('user')->
        whereIn('user_id', Auth::user()->friends()->pluck('friend_id'))->orWhere('user_id', $id)->latest()->get();
*//*
        $posts = Post::latest()->paginate(25);
        //random pepoel to add friends

        $peopelToFollow=User::where('id','!=',$id)->take(3)->inRandomOrder()->get();
         return Post::with('user','likes','comments')
         ->orderBy('created_at','DESC')
         ->get();
        */
        return view('vuetest');
    }
    /*
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'max:255',
        'content' => 'required',
      ]);

      $user = Auth::user();

      $post = $user->posts()->create([
        'title' => $request->title,
        'content' => $request->content,
        'published' => $request->has('published')
      ]);


      return redirect()->route('home');
    }*/

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
      

      alert()->success('You have created post.', 'Great Job!');
      return post::with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();

      
     // return response()->json($post);
    }

    public function friends()
    {
        return view('friends');
    }

    public function update(Request $request)
    {
      $this->validate($request, [
        'title' => 'max:255',
        'content' => 'min:10',
      ]);
      $post = Post::findOrFail($request->post_id);
      $post->title = $request->title;
      $post->content = $request->content;
      $post->published = ($request->has('published') ? true : false);
      $post->save();

      return back()->with('message','success');
    }

    public function updatePost(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'max:255',
        'content' => 'required|min:10',
      ]);

      $post = Post::findOrFail($id);
      if($request->title){
        $post->title = $request->title;  
      }
      $post->content = $request->content;
      $post->published = ($request->has('published') ? true : false);
      $post->save();

      return post::with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();
        alert()->success('You have update post.', 'Great Job!');
    }

     public function destroy($id)
    {
       $post = Post::findOrFail($id);
       $post->delete();
       
       return post::with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();
       
    }

}
