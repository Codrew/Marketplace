<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendMessageController extends Controller
{
    public function store(Request $request)
    {
        Message::create([
            'user_id' => $request->userId,
            'reciver_id' => $request->reciverId,
            'ads_id' => $request->adId,
            'body' => $request->body
        ]);
    }

    public function index()
    {
        return view('message.index');
    }

    public function user()
    {
        $conversation = Message::where('user_id',auth::id())
                               ->orWhere('reciver_id',auth::id())->get();

        $users = $conversation->map(function ($conversation){
            if($conversation->user_id === auth::id()){
                return $conversation->reciver;
            }
                return $conversation->sender;
        })->unique();

        return $users;
    }
}
