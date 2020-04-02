<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
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
    
        //alle User auswählen außer die, die gerade eingelogged sind
        $users = User::where('id', '!=', Auth::id())->get();
        return view('Chat.overview', ['users' => $users]);
    }
    
    public function getMessage($user_id) {
        return $user_id;

        $my_id = Auth::id();
        //Alle Nachrichten von ausgewählten Usern verarbeiten
                $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where ('from, $my_id')->where('to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();
        return view('messages.index', ['messages' => $messages]); 
    }
}
