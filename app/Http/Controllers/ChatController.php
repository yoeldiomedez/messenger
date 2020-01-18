<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return Chat::where('user_id', auth()->id())->get([
            'id',
            'contact_id',
            'has_blocked',
            'listen_notifications',
            'last_message',
            'last_time'
        ]);
    }
}
