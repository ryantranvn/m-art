<?php

namespace App\Http\Controllers\Website;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\Product;
use App\Picture;

class ProductController extends Controller
{
    public function index($categorySlug, Request $request)
    {
        $filterPrice = [];
        // get category
        $category = Category::where('slug', $categorySlug)->first();
        if (count($category)==0) {
            return redirect()->route('website404');
        }
        // get products in category
        $query = Product::leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                        ->leftJoin('suppliers', 'suppliers.supplier_id', '=', 'products.supplier_id')
                        ->leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
                        ->select(DB::raw('products.*, 
                        categories.name AS category_name, categories.slug AS category_slug,
                        suppliers.name AS supplier_name, 
                        provinces.name AS province_name,
                        (SELECT url FROM pictures WHERE products.product_id = pictures.product_id ORDER BY pictures.picture_id ASC LIMIT 1) AS thumbnail')
                        )
                        ->whereNull('categories.deleted_at')
                        ->whereNull('suppliers.deleted_at')
                        ->where('suppliers.status', 1)
                        ->where('categories.status', 1)
                        ->where('categories.slug', $categorySlug);
        if ($request->has('price')) {
            $query->orderBy('price', $request->price);
            $filterPrice = $request->price;
        }

        $products = $query->paginate(ITEMS_IN_PAGE);

        return view('website/product', ['category' => $category, 'products' => $products, 'filterPrice' => $filterPrice]);
    }

    public function productDetail($categorySlug, $productSlug, Request $request)
    {
        // get category
        $category = Category::where('slug', $categorySlug)->first();
        if (count($category)==0) {
            return redirect()->route('website404');
        }
        // get product
        $query = Product::leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
            ->leftJoin('suppliers', 'suppliers.supplier_id', '=', 'products.supplier_id')
            ->leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
            ->select(DB::raw('products.*, 
                        categories.name AS category_name,
                        suppliers.name AS supplier_name, suppliers.thumbnail AS supplier_picture,
                        provinces.name AS province_name')
            )
            ->whereNull('categories.deleted_at')
            ->whereNull('suppliers.deleted_at')
            ->where('suppliers.status', 1)
            ->where('categories.status', 1)
            ->where('products.slug', $productSlug);
            if ($request->has('supplier')) {
                $query->where('suppliers.supplier_id', $request->supplier);
            }
        $product = $query->first();

        if (count($product)==0) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect()->route('website404');
        }
        // get pictures
        $pictures = Picture::select('url')->where('product_id', '=', $product->product_id)->get();

        return view('website/product_detail', ['category' => $category, 'product' => $product, 'pictures' => $pictures]);
    }

    public function search(Request $request)
    {
        $products = [];
        $filterPrice = [];
        $validator = Validator::make($request->all(), [
            'search' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors());
        }
        else {
            // get products in category
            $query = Product::leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                ->leftJoin('suppliers', 'suppliers.supplier_id', '=', 'products.supplier_id')
                ->leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
                ->select(DB::raw('products.*, 
                        categories.name AS category_name, categories.slug AS category_slug,
                        suppliers.name AS supplier_name, 
                        provinces.name AS province_name,
                        (SELECT url FROM pictures WHERE products.product_id = pictures.product_id ORDER BY pictures.picture_id ASC LIMIT 1) AS thumbnail')
                )
                ->whereNull('categories.deleted_at')
                ->whereNull('suppliers.deleted_at')
                ->where('suppliers.status', 1)
                ->where('categories.status', 1)
                ->where('products.name', 'like', '%'.$request->search.'%');

            if ($request->has('price')) {
                $query->orderBy('price', $request->price);
                $filterPrice = $request->price;
            }
            $products = $query->paginate(ITEMS_IN_PAGE);
        }

        return view('website/product', ['products' => $products, 'filterPrice' => $filterPrice]);
    }

}
