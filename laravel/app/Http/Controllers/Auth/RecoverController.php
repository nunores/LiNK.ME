<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RecoverController extends Controller
{
    public function showRecoverForm() {
        $posts = Post::all()->where('id', '>', '0')->where('id', '<', '10');

        return view("auth.recover", ['posts' => $posts]);
    }

    public function recover(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
        ]);

        $user = User::all()->where("email", "=", $request->input("email"));
        if ($user == null) {
            return view("auth.recover");
        }
        $data = array('name'=>"LiNK.ME");
        Mail::send('mail', $data, function($message, $user) {
            $message->to($user->email, $user->username)->subject('Test Mail');
            $message->from('noreply@link.me','LiNK.ME');
        });
        return view("login");
    }
}
