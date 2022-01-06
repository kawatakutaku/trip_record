<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logoutForm()
    {
        return view('auth.logout');
    }

    public function logout(Request $request)
    {
        $this->auth = auth();
        $this->auth->logout();
        return redirect()->route('home');
    }
}
