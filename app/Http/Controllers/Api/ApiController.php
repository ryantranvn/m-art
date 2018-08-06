<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use App\Category;
use App\User;
use App\Supplier;
use App\Product;
use App\Order;
use App\Subscribe;
use App\Contact;
use Auth;

class ApiController extends Controller
{
    // update category status
    public function updateStatusCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            $category = Category::find($request->id);
            if (!$category) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            } else {
                $category->status = $request->status;
                $category->updated_by = Auth::user()->user_id;
                $saved = $category->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                } else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

    // update user status
    public function updateStatusUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            $user = User::find($request->id);
            if (!$user) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            } else {
                $user->status = $request->status;
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

    // update supplier status
    public function updateStatusSupplier(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            $supplier = Supplier::find($request->id);
            if (!$supplier) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            } else {
                $supplier->status = $request->status;
                $supplier->updated_by = Auth::user()->user_id;
                $saved = $supplier->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                } else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

    // update product status
    public function updateStatusProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            $product = Product::find($request->id);
            if (!$product) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            } else {
                $product->status = $request->status;
                $product->updated_by = Auth::user()->user_id;
                $saved = $product->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                } else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

    // update product status
    public function updateStatusSubscribe(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            $subscribe = Subscribe::find($request->id);
            if (!$subscribe) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            } else {
                $subscribe->status = $request->status;
                $subscribe->updated_by = Auth::user()->user_id;
                $saved = $subscribe->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                } else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

    // update contact status
    public function updateStatusContact(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            $contact = Contact::find($request->id);
            if (!$contact) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            } else {
                $contact->status = $request->status;
                $contact->updated_by = Auth::user()->user_id;
                $saved = $contact->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                } else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

    // update password
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'password' => 'required|between:6,20|confirmed',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            $user = User::find($request->id);
            if (!$user) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            }
            else {
                $user->password = bcrypt($request->password);
                $user->updated_by = Auth::user()->user_id;
                $saved = $user->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                    return back();
                }
                else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

    // update order status
    public function updateStatusOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            $order = Order::find($request->id);
            if (!$order) {
                $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            } else {
                $order->status = $request->status;
                $order->updated_by = Auth::user()->user_id;
                $saved = $order->save();
                if (!$saved) {
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                } else {
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
        }
        return back();
    }

}
