<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts() {
      return $this->hasMany('App\SocialAccount');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

   /* public function likes(){
        return $this->hasMany('App\Like');
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimeStamps();
    }*/
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes')->withTimeStamps();;
    }

    public function messages()
    {
      return $this->hasMany(Message::class);
    }

    // friendship that I started
    public function friends()
    {
        return $this->belongsToMany('App\User','friends_users','user_id','friend_id')->withPivot('status')->wherePivot('status', 1);
    }

    //check if user is friend or not
    public function isFriend($friendId) 
    {
        return (boolean) $this->friends()->where('users.id', $friendId)->count();
    }

    //check if user is friend or not
    public function isNotFriend() 
    {
        return $this->friends()->where('users.id','!=', 'friends.id')->get();
    }

    // friendship that I was invited to 
    public function friendOf()
    {
       return $this->belongsToMany('App\User', 'friends_users', 'friend_id', 'user_id')->withPivot('status')->wherePivot('status', 0);
    }

    // friendship that I started
    public function requests()
    {
        return $this->belongsToMany('App\User','friends_users','user_id','friend_id')->withPivot('status')->wherePivot('status', 0);
    }

    //check if request is sent or not
    public function requestIsSent($userId) 
    {
        return (boolean) $this->requests()->where('users.id', $userId)->count();
    }

   
    /*
public function friendsOfMine()
{
    return $this->belongsToMany('App\User', 'friends_users', 'user_id', 'friend_id');
}

public function friendOf()
{
    return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
}
public function friends()
{
    return $this->friendsOfMine()->wherePivot('accepted', true)->get()->merge($this->friendOf()->wherePivot('accepted', true)->get());
}
*/

    /*
    public function addFriend(User $user)
    {
       return $this->friends()->attach($user->id);
    }
    public function removeFriend(App\User $user)
    {
       return $this->friends()->detach($user->id);
    }
*/
}
