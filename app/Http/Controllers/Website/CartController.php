<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = [];
        if ($request->session()->has('cart') != null) {
            $cart = $request->session()->get('cart');
        }

        return view('website/cart', ['cart' => $cart]);
    }


}
