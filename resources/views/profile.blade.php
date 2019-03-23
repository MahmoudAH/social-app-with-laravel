$profileLikedPosts = Post::whereHas('likes', function($query) use ($user) {
        return $query->where('user_id', $user->id);
    })
    ->get();
Next, you can get the liked posts of the currently logged in user like this:

// The "whereIn" just limits the results to those posts already retrieved
// for the profile user. Not required, but gives a little performance boost
// if this collection doesn't need the non-profile-liked posts.

$authUser = Auth::user();
$authLikedPosts = Post::whereHas('likes', function($query) use ($authUser) {
        return $query->where('user_id', $authUser->id);
    })
    ->whereIn('id', $profileLikedPosts->lists('id'))
    ->get();
Now, in your blade template, as you loop through the liked posts for the profile user ($profileLikedPosts), you can use the Collection contains() method to check if the post was also liked by the logged in user:

@foreach ($profileLikedPosts as $post)
    // ...
    @if ($authLikedPosts->contains('id', $post->id))
        // this post is liked by both; show your icon
    @endif
    // ...
@endforeach