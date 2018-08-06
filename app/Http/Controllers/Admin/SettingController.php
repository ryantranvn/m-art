<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $noSearch = true;

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.index',
            compact('noSearch'));
    }
}
