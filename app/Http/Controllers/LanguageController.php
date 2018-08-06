<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Redirect;

class LanguageController extends Controller
{
    public function index()
    {
        if (!\Session::has('locale')) {
            \Session::put('locale', Input::get('locale'));
        }
        else {
            Session::put('locale', Input::get('locale'));
        }
        return Redirect::back();
    }
}
