<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//only authenticated users
 Broadcast::channel('chat', function ($user) {
  return Auth::check();
});
//onlinee users
Broadcast::channel('online', function ($user) {
  return $user;
});
 


//Broadcast::channel('post.{id}', function ($user, $id) {
  //  return true;
    //return $user->id == \App\Post::find($id)->user_id;
//});
