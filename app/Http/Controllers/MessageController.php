<?php

namespace App\Http\Controllers;

use DB;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $user_id    = auth()->id();
        $contact_id = $request->contact_id;

        return Message::select(
            'id', 
            DB::raw("IF(`from_id`=$user_id, TRUE, FALSE) as written_by_me"), 
            'created_at', 
            'content'
        )->where(function ($query) use ($user_id, $contact_id) {
            $query->where('from_id', $user_id)->where('to_id', $contact_id);
        })->orWhere(function ($query) use ($user_id, $contact_id) {
            $query->where('from_id', $contact_id)->where('to_id', $user_id);
        })->get();
    }

    public function store(Request $request)
    {
        $message = new Message;

        $message->from_id = auth()->id();
        $message->to_id   = $request->to_id;
        $message->content = $request->content;
        $saved = $message->save();

        $data = [];

        $data['success'] = $saved;
        $data['message'] = $message;
        
        return $data;
    }
}
