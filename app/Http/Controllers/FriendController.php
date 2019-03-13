<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Friend;
use App\User;
use Auth;

class FriendController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $users=User::where('id','!=',Auth::id())->get();
        /*$users=User::join('friends_users'
            ,'users.id','!=','friends_users.friend_id')->first();
        dd($users);*/
        return view('friends',  ['users' => $users]);
    }
    public function test()
    {
        return view('test');
    }
    public function addFriend($id)
    {
        
        $user=auth()->user();
        $user->friends()->attach($id);
        /*$isFriend =$user->requestIsSent($id);
        dd($isFriend);*/
        //dd( $user->isNotFriend() );
        return back()->with('message', 'request was sent successfully');
        //dd($isFriend);
        //$friends = User::find(Auth::user()->id)->friends;

        //$isFriend = Friend::where('friend_id','=',$id)->first();
        /*$isFriend =$user->isFriend($id);
        if($isFriend){
            return back()->with('message','this user is already friend ');
        }else{
        $user->friends()->attach($id);
        return redirect()->route('friend.get',[$user])->with('message', 'request was sent successfully');
        }*/
        
        /*$status= Friend::where('friend_id','=',$id)->update(array('status' => '1'));
        dd($status);

       /*$test= $user->friends()->pivot->status;
       dd($test);
        $status = Friend::where('friend_id','=',$id)->first();
        //dd(!$status->status);
        if( isset($status) ){
           if(!$status->status){
                    $status->status = 1;
                    $status->save();
                   }
        }*/
        
        /*$isFriend =Friend::where('friend_id','=',$id)->first();
        //dd($isFriend);
        if($isFriend) {
          $isFriend->status=1;
          $isFriend->save();
        }*/
        
    }
    public function getFriend($id){
        $user=User::findOrFail($id);
        return view('friends',compact('user'));

    }
    public function removeFriend($id){
        $user=auth()->user();
        //$user2=User::findOrFail($id);
        //dd($user);
        $user->friends()->detach($id);
        return back()->with('message','friend was removed');

    }
    public function showRequsts(){
        $user = Auth::user();
        $requests=Friend::where('friend_id','=',Auth::id())->get();
         return view('friends',compact('requests'));

        /*
        dd($request->friend_id);
        $request = $user->friendOf();
        dd('yes i did');*/
    }
    public function acceptFriend($id){
        //$friend=Friend::findOrFail($id);
        $user=Auth::user();
        $user->friendOf()->updateExistingPivot($id, ['status'=>1]);
         return back()->with('message','now you are friends');
       // $user->friendOf()->attach($id, ['status' => 1]);
        //$user->friendOf()->where('friend_id','=',$id)->first()->update(array('status' => 1));
        /*$user->friends()->updateExistingPivot($id, $attributes);
        dd($friend->status);
        $friend->status = 1 ;
        $friend->save();*/
       
    }
}
