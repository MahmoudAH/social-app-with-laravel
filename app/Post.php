<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Post extends Model
{
  protected $fillable = [
      'title', 'content', 'published'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

  /*public function likes(){
    return $this->hasMany('App\Like');
  }*/
  
  public function likes()
  {
    return $this->belongsToMany(User::class, 'likes')->withTimeStamps();
  }
  public function liked()
  {
    return (bool) Like::where('user_id', Auth::id())
                        ->where('post_id', $this->id)
                        ->first();
  }
  public function load_display()
    {

        $load = Post::liked()->get();

        return response()->json($load );

    }

}
