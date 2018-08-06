<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Auth;

class AjaxController extends Controller
{
    // edit inline
    public function editInline(Request $request) {
        $validator = Validator::make($request->all(), [
            'table' => 'required',
            'fieldId' => 'required',
            'id' => 'required',
            'field' => 'required',
            'val' => 'required'
        ]);
        if ($validator->fails()) {
            $response = array('error' => 1, 'msg' => $validator->errors());
        }
        else {
            $table = $request->table;
            $fieldId = $request->fieldId;
            $id = $request->id;
            $field = $request->field;
            $val = $request->val;
            $updated = DB::table($table)
                            ->whereNull('deleted_at')
                            ->where($fieldId, $id)
                            ->update([
                                $field => $val,
                                'updated_by' => Auth::user()->user_id
                            ]);
            if (!$updated) {
                $response = array('error' => 1, 'msg' => trans('adminbsb.edit_fail'));
            }
            else {
                $response = array('error' => 0, 'msg' => trans('adminbsb.edit_success'));
            }
        }

        return \Response::json($response);
    }

    // get districts
    public function getDistricts(Request $request) {
        $validator = Validator::make($request->all(), [
            'provinceId' => 'required'
        ]);
        if ($validator->fails()) {
            $response = array('error' => 1, 'msg' => $validator->errors());
        }
        else {
            $districts = DB::table('districts')
                        ->where('province_id', '=', $request->provinceId)
                        ->orderBy('type', 'asc')
                        ->orderBy('name', 'asc')
                        ->get();

            if (count($districts)>0) {
                $response = array('error' => 0, 'districts' => $districts);
            }
            else {
                $response = array('error' => 1, 'msg' => trans('adminbsb.can_not_find_districts'));
            }
        }

        return \Response::json($response);
    }

    // get supplier
    public function getSupplier(Request $request) {
        $validator = Validator::make($request->all(), [
            'supplierId' => 'required'
        ]);
        if ($validator->fails()) {
            $response = array('error' => 1, 'msg' => $validator->errors());
        }
        else {
            $supplier = DB::table('suppliers')
                ->select('suppliers.thumbnail', 'provinces.name AS province_name')
                ->join('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
                ->where('suppliers.supplier_id', '=', $request->supplierId)
                ->first();

            if ($supplier) {
                $response = array('error' => 0, 'supplier' => $supplier);
            }
            else {
                $response = array('error' => 1, 'msg' => trans('adminbsb.can_not_find_data'));
            }
        }

        return \Response::json($response);
    }

    // add to cart
    public function addToCart(Request $request) {
        $validator = Validator::make($request->all(), [
            'productId' => 'required',
            'quantity' => 'required|max:20',
            'inCart' => 'required',
        ]);
        if ($validator->fails()) {
            $response = array('error' => 1, 'msg' => $validator->errors());
        }
        else {
            $productId = $request->productId;
            $quantity = $request->quantity;
            $inCart = $request->inCart;

            // get product
            $query = DB::table('products')
                ->leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                ->leftJoin('suppliers', 'suppliers.supplier_id', '=', 'products.supplier_id')
                ->leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
                ->select(DB::raw('products.*, 
                        categories.name AS category_name, categories.slug AS category_slug,
                        suppliers.name AS supplier_name, suppliers.thumbnail AS supplier_picture,
                        provinces.name AS province_name,
                        (SELECT url FROM pictures WHERE products.product_id = pictures.product_id ORDER BY pictures.picture_id ASC LIMIT 1) AS thumbnail')
                )
                ->whereNull('categories.deleted_at')
                ->whereNull('suppliers.deleted_at')
                ->whereNull('products.deleted_at')
                ->where('suppliers.status', 1)
                ->where('categories.status', 1)
                ->where('products.product_id', $productId);
            if ($request->has('supplier')) {
                $query->where('suppliers.supplier_id', $request->supplier);
            }
            $product = $query->first();

            if (count($product) == 0) {
                $response = array('error' => 1, 'msg' => 'data not exist');
            }
            else {
                $product = (array)$product;
                // int cart
                if ($request->session()->has('cart') != null) {
                    $cart = $request->session()->get('cart');
                }
                else {
                    $cart['totalItems'] = 0;
                    $cart['subTotal'] = 0;
                    $cart['total'] = 0;
                    $cart['products'] = [];
                }
                // not exist product in cart
                if (!array_has($cart['products'], $productId)) {
                    $product['quantity'] = 0;
                    $product['subTotalItem'] = 0;
                    $cart['products'][$productId] = $product;
                }
                // check in product or in cart
                if ($inCart == 'true') { // in cart
                    $moreItem = $quantity - $cart['products'][$productId]['quantity'];
                    $cart['products'][$productId]['quantity'] = $quantity;
                    $cart['products'][$productId]['subTotalItem'] = $cart['products'][$productId]['price'] * $cart['products'][$productId]['quantity'];
                    $cart['totalItems'] = $cart['totalItems'] + $moreItem;
                    $cart['subTotal'] = $cart['subTotal'] + ($cart['products'][$productId]['price'] * $moreItem);
                }
                else { // in product
                    $cart['products'][$productId]['quantity'] = $cart['products'][$productId]['quantity'] + $quantity;
                    $cart['products'][$productId]['subTotalItem'] = $cart['products'][$productId]['price'] * $cart['products'][$productId]['quantity'];
                    $cart['totalItems'] = $cart['totalItems'] + $quantity;
                    $cart['subTotal'] = $cart['subTotal'] + ($cart['products'][$productId]['price'] * $quantity);
                }
                $cart['total'] = $cart['subTotal'] + TAX + DELIVERY;
                if ($request->session()->has('cart') !== null) {
                    $request->session()->forget('cart');
                }
                $request->session()->put('cart', $cart);

                $response = array('error' => 0, 'cart' => $cart);
            }
        }
        return \Response::json($response);
    }

    // delete cart
    public function deleteCart(Request $request) {
        $validator = Validator::make($request->all(), [
            'productId' => 'required'
        ]);
        if ($validator->fails()) {
            $response = array('error' => 1, 'msg' => $validator->errors());
        }
        else {
            $productId = $request->productId;
            if ($request->session()->has('cart') == null) {
                $response = array('error' => 1, 'msg' => trans('adminbsb.empty_cart'));
            }
            else {
                $cart = $request->session()->get('cart');
                $findProduct = array_get($cart['products'], $productId, 'not_find');
                if ($findProduct == null) {
                    $response = array('error' => 1, 'msg' => trans('adminbsb.not_exist_in_cart'));
                }
                else {
                    $cart['totalItems'] = $cart['totalItems'] - $findProduct['quantity'];
                    $cart['subTotal'] = $cart['subTotal'] - $findProduct['subTotalItem'];
                    $cart['total'] = $cart['subTotal'] + TAX + DELIVERY;
                    array_forget($cart['products'], $productId);

                    $request->session()->forget('cart');
                    if (count($cart['products'])>0) {
                        $request->session()->put('cart', $cart);
                    }

                    $response = array('error' => 0, 'cart' => $cart);
                }
            }
        }
        return \Response::json($response);
    }

    // get order detail
    public function getOrderDetail(Request $request) {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required'
        ]);
        if ($validator->fails()) {
            $response = array('error' => 1, 'msg' => $validator->errors());
        }
        else {
            $orderDetails = DB::table('order_details')
                ->leftJoin('products', 'products.product_id', '=', 'order_details.product_id')
                ->select('order_details.*',
                    'products.name AS product_name',
                    'products.status AS product_status'
                    )
                ->whereNull('order_details.deleted_at')
                ->where('order_details.order_id', $request->orderId)
                ->get();
            if (count($orderDetails)==0) {
                $response = array('error' => 1, 'msg' => trans('aminbsb.can_not_get_data'));
            }
            else {
                $response = array('error' => 0, 'orderDetails' => $orderDetails);
            }
        }
        return \Response::json($response);
    }

    // subscribe
    public function subscribe(Request $request) {
        $validator = Validator::make($request->all(), [
            'subscribe_email' => 'required|email|max:255'
        ]);
        if ($validator->fails()) {
            $response = array('error' => 1, 'msg' => $validator->errors());
        }
        else {
            $subscribe_email = strtolower(trim($request->subscribe_email));
            // check existed
            $email = DB::table('subscribes')
                ->where('email', $subscribe_email)
                ->first();
            if (count($email)>0) {
                $response = array('error' => 0);
                //$response = array('error' => 1, 'msg' => trans('adminbsb.subscribe_email_exist'));
            }
            else {
                // insert data
                $saved = DB::table('subscribes')->insert([
                    'email' => $subscribe_email,
                    'created_at' => nowDatetime(),
                    'updated_at' => nowDatetime()
                ]);
                if (!$saved) {
                    $response = array('error' => 1, 'msg' => trans('adminbsb.subscribe_email_exist'));
                }
                else {
                    $response = array('error' => 0);
                }
            }
        }
        return \Response::json($response);
    }

    // updateOrderNote
    public function updateOrderNote(Request $request) {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required',
            'note' => 'required|max:1023'
        ]);
        if ($validator->fails()) {
            $response = array('error' => 1, 'msg' => $validator->errors());
        }
        else {
            $order = DB::table('orders')
                ->where('order_id', $request->orderId)
                ->whereNull('deleted_at')
                ->first();
            if (count($order)==0) {
                $response = array('error' => 1, 'msg' => trans('adminbsb.can_not_find_data'));
            }
            else {
                $saved = DB::table('orders')
                    ->where('order_id', $request->orderId)
                    ->update([
                        'note' => $request->note
                    ]);
                if (!$saved) {
                    $response = array('error' => 1, 'msg' => trans('adminbsb.edit_fail'));
                }
                else {
                    $response = array('error' => 0, 'msg' => trans('adminbsb.edit_success'));
                }
            }
        }
        return \Response::json($response);
    }
}
