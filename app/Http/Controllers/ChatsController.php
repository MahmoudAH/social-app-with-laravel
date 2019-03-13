<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Message;
use App\User;
use Auth;

class ChatsController extends Controller
{
	public function __construct()
	{
	  $this->middleware('auth');
	}

	/**
	 * Show chats
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	  $users = User::all();	
	  return view('chat',compact('users'));
	}

	/**
	 * Fetch all messages
	 *
	 * @return Message
	 */
	public function fetchMessages()
	{
	  return Message::with('user')->get();
	}

	/**
	 * Persist message to database
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function sendMessage(Request $request)
	{
	  $this->validate($request, [
        'message' => 'required',
      ]);
	  
	  $user = Auth::user();
	  $message = $user->messages()->create([
	    'message' => $request->message,
	    'user_id' => Auth::id()

	  ]);
      
      broadcast(new MessageSent($user ,$message))->toOthers();
	  return ['status' => 'Message Sent!'];
	}
}
