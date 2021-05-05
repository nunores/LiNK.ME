<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function home() {
        if (Auth::check()) {
            return view('pages.home');
        } else {
            return redirect('login');
        }
    }
}
