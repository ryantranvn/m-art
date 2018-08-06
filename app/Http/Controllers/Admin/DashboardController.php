<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use App\Supplier;
use App\Product;
use App\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $noSearch = true;
        $noBox = true;

        $totalUser = $this->totalUser();
        $totalSupplier = $this->totalSupplier();
        $totalProduct = $this->totalProduct();
        $totalOrder = $this->totalOrder();

        return view(BULK_SYSTEM_THEME.'.dashboard',
            compact('noSearch', 'noBox', 'totalUser', 'totalSupplier', 'totalProduct', 'totalOrder'));
    }

    private function totalUser()
    {
        return User::where('type', 'user')->count();
    }
    private function totalSupplier()
    {
        return Supplier::count();
    }
    private function totalProduct()
    {
        return Product::count();
    }
    private function totalOrder()
    {
        return Order::count();
    }

    public function admin404()
    {
        return view(BULK_SYSTEM_THEME.'.admin404',
            compact(''));
    }

}
