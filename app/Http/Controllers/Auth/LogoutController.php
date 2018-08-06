<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->type == 'admin') {
            $redirectUrl = '/admin';
        }
        else {
            $redirectUrl = '/';
        }
        Auth::guard('web')->logout();
        if ($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }

        return redirect($redirectUrl);
    }
}
