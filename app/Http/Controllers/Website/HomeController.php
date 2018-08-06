<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $activeNav = "home";

        return view('website/home', ['activeNav' => $activeNav]);
    }

    public function website404()
    {
        return view('website/website404');
    }
}
