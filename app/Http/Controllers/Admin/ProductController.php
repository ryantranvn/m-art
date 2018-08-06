<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Picture;
use App\Http\Requests\ProductRequest;
use Auth;
use DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::leftJoin('suppliers', 'suppliers.supplier_id', '=', 'products.supplier_id')
                        ->leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                        ->leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
                        ->select(DB::raw('products.*,
                        categories.name AS category_name,
                        suppliers.name AS supplier_name,
                        provinces.name AS province_name,
                        (SELECT url FROM pictures WHERE products.product_id = pictures.product_id ORDER BY pictures.picture_id ASC LIMIT 1) AS thumbnail')
                        );
        // search
        $searchValues = ['name' => '', 'status' => '', 'province_id' => '', 'category_id' => '', 'supplier_id' => ''];
        if ($request->has('name')) {
            $searchValues['name'] = $request->name;
            $query->where('products.name', 'like', '%'.$request->name.'%');
        }
        if ($request->has('status')) {
            $searchValues['status'] = $request->status != 1 ? 0 : 1;
            $query->where('products.status', $searchValues['status']);
        }
        if ($request->has('category_id')) {
            $searchValues['category_id'] = $request->category_id;
            $query->where('products.category_id', $searchValues['category_id']);
        }
        if ($request->has('supplier_id')) {
            $searchValues['supplier_id'] = $request->supplier_id;
            $query->where('products.supplier_id', $searchValues['supplier_id']);
        }
        if ($request->has('province_id')) {
            $searchValues['province_id'] = $request->province_id;
            $query->where('provinces.province_id', $searchValues['province_id']);
        }

        // sorting
        if ($request->has('sorting')) {
            if ($request->sorting == 'category') {
                $query->withSort('categories.name', $request->by);
            }
            else if ($request->sorting == 'supplier') {
                $query->withSort('suppliers.name', $request->by);
            }
            else if ($request->sorting == 'location') {
                $query->withSort('provinces.name', $request->by);
            }
            else {
                $query->withSort($request->sorting, $request->by);
            }
        }
        else {
            $query->withSort('updated_at', 'desc');
        }

        $products = $query->paginate(15);

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.index',
            compact('searchValues', 'products'));
    }

    public function create()
    {
        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.create',
            compact(''));
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = new Product();
                $product->name = $request->name;
                $product->slug = str_slug($request->name);
                $product->status = $request->status != 1 ? 0 : 1;
                $product->recommend = $request->recommend != 1 ? 0 : 1;
                $product->small_description = $request->small_description;
                $product->description = $request->description;
                $product->supplier_id = $request->supplier_id;
                $product->category_id = $request->category_id;
                $product->price = $request->price;
                $product->created_by = Auth::user()->user_id;
            $productSaved = $product->save();
            if (!$productSaved) {
                DB::rollback();
                $request->session()->flash('danger', trans('adminbsb.create_fail'));
                return back();
            }
            else {
                // insert pictures
                foreach ($request->picture as $url) {
                    if ($url != null && $url != "") {
                        $picture = new Picture();
                            $picture->module = 'product';
                            $picture->product_id = $product->product_id;
                            $picture->url = $url;
                        $pictureSaved = $picture->save();
                        if (!$pictureSaved) {
                            DB::rollback();
                            $request->session()->flash('danger', trans('adminbsb.create_fail'));
                            return back();
                        }
                    }
                }
                DB::commit();
                $request->session()->flash('success', trans('adminbsb.create_success'));
            }
        }
        catch (Exception $e) {
            DB::rollback();
            $request->session()->flash('danger', trans('adminbsb.create_fail'));
            return back();
        }

        return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
    }

    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.show',
            compact('product'));
    }

    public function edit(Request $request, $id)
    {
        $product = Product::leftJoin('suppliers', 'suppliers.supplier_id', '=', 'products.supplier_id')
                        ->leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                        ->leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
                        ->select('products.*', 'provinces.name AS province_name')
                        ->find($id);
        if (!$product) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.edit',
            compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::with('pictures')->find($id);
        if (!$product) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
        }
        else {
            DB::beginTransaction();
            try {
                $product->name = $request->name;
                $product->slug = str_slug($request->name);
                $product->status = $request->status != 1 ? 0 : 1;
                $product->recommend = $request->recommend != 1 ? 0 : 1;
                $product->small_description = $request->small_description;
                $product->description = $request->description;
                $product->supplier_id = $request->supplier_id;
                $product->category_id = $request->category_id;
                $product->price = $request->price;
                $product->created_by = Auth::user()->user_id;
                $productSaved = $product->save();
                if (!$productSaved) {
                    DB::rollback();
                    $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                    return back();
                }
                else {
                    // delete old pictures
                    if (count($product->pictures)>0) {
                        foreach ($product->pictures as $picture) {
                            $picture = Picture::find($picture->picture_id);
                            $picture->delete();
                        }
                    }
                    // insert pictures
                    foreach ($request->picture as $url) {
                        if ($url != null && $url != "") {
                            $picture = new Picture();
                            $picture->module = 'product';
                            $picture->product_id = $product->product_id;
                            $picture->url = $url;
                            $pictureSaved = $picture->save();
                            if (!$pictureSaved) {
                                DB::rollback();
                                $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                                return back();
                            }
                        }
                    }
                    DB::commit();
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
            catch (Exception $e) {
                DB::rollback();
                $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                return back();
            }
        }
        return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
        }
        else {
            DB::beginTransaction();
            try {
                // delete old pictures
                if (count($product->pictures) > 0) {
                    foreach ($product->pictures as $picture) {
                        $picture = Picture::find($picture->picture_id);
                        $deleted = $picture->delete();
                        if ($deleted == false) {
                            DB::rollback();
                            $request->session()->flash('danger', trans('adminbsb.delete_fail'));
                            break;
                        }
                    }
                }
                // delete product
                $deleted = $product->delete();
                if ($deleted == false) {
                    DB::rollback();
                    $request->session()->flash('danger', trans('adminbsb.delete_fail'));
                }
                else {
                    DB::commit();
                    $request->session()->flash('success', trans('adminbsb.edit_success'));
                }
            }
            catch (Exception $e) {
                DB::rollback();
                $request->session()->flash('danger', trans('adminbsb.delete_fail'));
            }
        }
        return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
    }
}
