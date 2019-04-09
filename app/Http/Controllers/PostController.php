<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;
use App\user;
use Auth;
use Alert;
use App\Http\Resources\PostCollection;

use App\Notifications\NewPost;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $posts = Post::paginate(25);

      return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      $this->validate($request, [
        'title' => 'max:255',
        'content' => 'required',
      ]);

      $user = Auth::user();

      $post = $user->posts()->create([
        'content' => $request->content,
        'published' => $request->has('published')
      ]);
    /*  $user->notify(new NewPost($post));
      alert()->success('You have created post.', 'Great Job!');
    */
      return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::findOrFail($id);
     // $user = User::findOrFail($id);
      return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::findOrFail($id);
      return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
        'content' => 'required',
      ]);

      $post = Post::findOrFail($id);
      $post->title = $request->title;
      $post->content = $request->content;
      $post->published = ($request->has('published') ? true : false);
      $post->save();

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);
       $post->delete();
       alert()->success('You have deletd post.', 'Good bye!');
      //Session::get('sweet_alert.buttons');

       return back();
    }

    public function notify($user_id,$post_id) {
    $user = User::find($user_id);
    $post = Post::find($post_id);

    $user->notify(new NewPost($post));
    }

    public function load_display()
    {

       $load = Post::with('liked')->get();
        dd($load);
        return response()->json($load );

    }
    

}
