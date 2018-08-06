<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use DB;
use App\User;
use App\Order;

class MyAccountController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = User::leftJoin('provinces', 'provinces.province_id', '=', 'users.province_id')
            ->leftJoin('districts', 'districts.district_id', '=', 'users.district_id')
            ->select('users.*',
                'provinces.name AS province_name',
                'districts.name AS district_name', 'districts.type AS district_type'
            )
            ->find(Auth::user()->user_id);

        return view('website/myaccount', ['user' => $user]);
    }

    public function updateSetting(Request $request)
    {
        $userId = $request->userId;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$userId.',user_id'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $user = User::find($userId);
            if (!$user) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            }
            else {
                $user->name = $request->name;
                $user->email = strtolower(trim($request->email));
                $user->province_id = $request->province_id;
                $user->district_id = $request->district_id;
                $user->address = $request->address;
                $user->updated_by = Auth::user()->user_id;
                $saved = $user->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                } else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

    public function password()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::user();

        return view('website/myaccount', ['user' => $user]);
    }

    public function updatePassword(Request $request)
    {
        $userId = $request->userId;
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|between:6,20',
            'password' => 'required|between:6,20|confirmed'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $user = User::find($userId);
            if (!$user) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            }
            else {
                $oldPassword = $user->password;
                if (bcrypt($request->old_password) != $oldPassword) {
                    $request->session()->flash('danger', trans('adminbsb.wrong_old_password'));
                }
                else {
                    $user->password = bcrypt($request->password);
                    $user->updated_by = $userId;
                    $saved = $user->save();
                    if (!$saved) {
                        $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                    }
                    else {
                        $request->session()->flash('success', trans('adminbsb.edit_success'));
                    }
                }
            }
        }
        return back();
    }

    public function orders()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::user();

        $query = Order::leftJoin('users', 'users.user_id', '=', 'orders.user_id')
            ->select('orders.*',
                'users.name AS customer_name'
            );
        $orders = $query->paginate(15);

        return view('website/myaccount', ['user' => $user, 'orders' => $orders]);
    }

    public function cancelOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $order = Order::find($request->orderId);

            if (!$order) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            }
            else {
                $order->status = 3;
                $order->cancel_reason = trim($request->reason);
                $order->updated_by = Auth::user()->user_id;
                $saved = $order->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                }
                else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

}
