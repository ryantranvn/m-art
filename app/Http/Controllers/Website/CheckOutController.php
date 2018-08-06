<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Order;
use App\OrderDetail;
use DB;

class CheckOutController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $user = [
            'userId' => Auth::user()->user_id,
            'name' => Auth::user()->name,
            'address' => Auth::user()->address,
            'phone' => Auth::user()->phone,
        ];
        if ($request->session()->has('cart') == null) {
            return redirect('/');
        }
        $cart = $request->session()->get('cart');

        return view('website/checkout', ['cart' => $cart, 'user' => $user]);
    }

    public function checkout(Request $request)
    {
        if ($request->session()->has('cart') == null) {
            return back();
        }
        $cart = $request->session()->get('cart');
        $products = $cart['products'];
        DB::beginTransaction();
        try {
            // insert orders
            $order = new Order();
            $order->user_id = Auth::user()->user_id;
            $order->subtotal = $cart['subTotal'];
            $order->tax = TAX;
            $order->delivery = DELIVERY;
            $order->total = $cart['total'];
            $order->created_by = Auth::user()->user_id;
            $orderSaved = $order->save();
            if (!$orderSaved) {
                DB::rollback();
                $request->session()->flash('danger', trans('adminbsb.order_fail'));
                return back();
            }
            // insert order detail
            foreach ($products as $product) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->order_id;
                $orderDetail->product_id = $product['product_id'];
                $orderDetail->price = $product['price'];
                $orderDetail->quantity = $product['quantity'];
                $orderDetail->total = $product['subTotalItem'];
                $orderDetail->created_by = Auth::user()->user_id;
                $orderDetailSaved = $orderDetail->save();
            }
            if (!$orderDetailSaved) {
                DB::rollback();
                $request->session()->flash('danger', trans('adminbsb.order_fail'));
                return back();
            }

            DB::commit();
            $request->session()->flash('success', trans('adminbsb.order_success'));
            $request->session()->forget('cart');
            $request->session()->flash('checkout_done', true);
            return redirect('/checkout-success');
        }
        catch (Exception $e) {
            DB::rollback();
            $request->session()->flash('danger', trans('adminbsb.order_fail'));
            return back();
        }

        return redirect('/checkout');
    }

    public function checkoutSuccess(Request $request)
    {
        if ($request->session()->has('checkout_done') !== null) {
            //return redirect('website404');
        }
        $request->session()->forget('checkout_done');
        return view('website/checkout_success');
    }
}
