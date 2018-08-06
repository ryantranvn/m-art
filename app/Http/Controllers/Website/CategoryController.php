<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Picture;
use DB;

class CategoryController extends Controller
{
    public function index()
    {

        return view('website/category');
    }
}
