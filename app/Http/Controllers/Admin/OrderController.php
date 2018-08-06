<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::leftJoin('users', 'users.user_id', '=', 'orders.user_id')
            ->select('orders.*',
                'users.name AS customer_name'
            );

        $searchValues = ['customer_name' => '', 'status' => '', 'created_at'];
        if ($request->has('customer_name')) {
            $searchValues['customer_name'] = $request->customer_name;
            $query->where('users.name', 'like', '%'.$request->customer_name.'%');
        }
        if ($request->has('status')) {
            $searchValues['status'] = $request->status != 1 ? 0 : 1;
            $query->where('orders.status', $searchValues['status']);
        }
        // sorting
        if ($request->has('sorting')) {
            if ($request->sorting == 'customer_name') {
                $query->withSort('users.name', $request->by);
            }
            else {
                $query->withSort($request->sorting, $request->by);
            }
        }

        $orders = $query->paginate(15);

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.index',
            compact('searchValues', 'orders'));
    }

    public function destroy($id)
    {
        //
    }
}
