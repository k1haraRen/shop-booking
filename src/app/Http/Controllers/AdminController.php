<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotifyAllUsersMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function create()
    {
        return view('shop.mail');
    }

    public function send(Request $request)
    {
        $request->validate(['content' => 'required|string|max:2000']);

        $content = $request->input('content');

        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->queue(new NotifyAllUsersMail($content));
        }

        return back()->with('success', '送信しました');
    }
}
