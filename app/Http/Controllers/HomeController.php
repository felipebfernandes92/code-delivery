<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function checkAuth()
    {
        if(!Auth::check()) {
            return redirect('/auth/login');
        }

        return view('home');
    }
}
