<?php

/* Datetime **************************************************** */
    function nowDatetime()
    {
        $now = date('Y-m-d H:i:s');
        return $now;
    }
// compare 2 datetime
    function diffDate($date1, $date2) {
        $datetime1 = date_create($date1);
        $datetime2 = date_create($date2);

        return date_diff($datetime1, $datetime2);
    }
// separate date & time in datetime
    function separateDatetime($datetime) {
        $listDatetime = explode(' ', $datetime);

        return $listDatetime;
    }
/* **************************************************** */
// get controller and action
    function getRoute($type = 'controller') {
        $action = app('request')->route()->getAction();

        $controller = class_basename($action['controller']);

        list($controller, $action) = explode('@', $controller);
        $controller = str_replace('controller', '', strtolower($controller));
        $arrRoute = ['controller' => $controller, 'action' => $action];

        return $arrRoute[$type];
    }
// get Province
    function getProvince($province_id=null)
    {
        $cond = [];
        if (isset($province_id) && $province_id != null) {
            $cond[] = ['province_id', '=', $province_id];
        }
        $provinces = DB::table('provinces')
            ->select('*')
            ->where($cond)
            ->orderBy('order', 'desc')
            ->orderBy('name', 'asc')
            ->get();

        return $provinces;
    }
// get District
    function getDistrict($province_id=null)
    {
        $cond = [];
        if (isset($province_id) && $province_id != null) {
            $cond[] = ['province_id', '=', $province_id];
        }
        $districts = DB::table('districts')
            ->where($cond)
            ->orderBy('name', 'asc')
            ->get();

        return $districts;
    }
// get User
    function getUser($userId) {
        $user = DB::table('users')
            ->whereNull('deleted_at')
            ->where('user_id', $userId)
            ->first();
        return $user;
    }
// get Suppliers list for select
    function getSuppliers($status = null) {
        $query = DB::table('suppliers')->whereNull('deleted_at');
        if ($status !== null) {
            $query->where('status', $status);
        }
        $suppliers = $query->orderBy('name', 'asc')->get();

        return $suppliers;
    }
// get Suppliers list for select
    function getCategories($status = null) {
        $query = DB::table('categories')->whereNull('deleted_at');
        if ($status !== null) {
            $query->where('status', $status);
        }
        $categories = $query->orderBy('order', 'asc')->get();

        return $categories;
    }
// arrStatus
    function arrStatus($module) {
        $arr = [
            'category' => [
                ['value' => 1, 'text' => trans('adminbsb.show'), 'color' => 'bg-blue'],
                ['value' => 0, 'text' => trans('adminbsb.hide'), 'color' => 'bg-grey']
            ],
            'user' => [
                ['value' => 1, 'text' => trans('adminbsb.active'), 'color' => 'bg-blue'],
                ['value' => 0, 'text' => trans('adminbsb.inactive'), 'color' => 'bg-grey']
            ],
            'supplier' => [
                ['value' => 1, 'text' => trans('adminbsb.active'), 'color' => 'bg-blue'],
                ['value' => 0, 'text' => trans('adminbsb.inactive'), 'color' => 'bg-grey']
            ],
            'product' => [
                ['value' => 1, 'text' => trans('adminbsb.show'), 'color' => 'bg-blue'],
                ['value' => 0, 'text' => trans('adminbsb.hide'), 'color' => 'bg-grey']
            ],
            'recommend_product' => [
                ['value' => 1, 'text' => trans('adminbsb.recommend'), 'color' => 'bg-red'],
                ['value' => 0, 'text' => trans('adminbsb.normal'), 'color' => 'bg-blue']
            ],
            'order' => [
                ['value' => 0, 'text' => trans('adminbsb.pending'), 'color' => 'bg-blue'],
                ['value' => 1, 'text' => trans('adminbsb.on_delivery'), 'color' => 'bg-green'],
                ['value' => 2, 'text' => trans('adminbsb.done'), 'color' => 'bg-grey'],
                ['value' => 3, 'text' => trans('adminbsb.cancel'), 'color' => 'bg-black']
            ],
            'subscribe' => [
                ['value' => 1, 'text' => trans('adminbsb.active'), 'color' => 'bg-blue'],
                ['value' => 0, 'text' => trans('adminbsb.inactive'), 'color' => 'bg-grey']
            ],
            'contact' => [
                ['value' => 1, 'text' => trans('adminbsb.replied'), 'color' => 'bg-blue'],
                ['value' => 0, 'text' => trans('adminbsb.new'), 'color' => 'bg-grey']
            ]
        ];

        return $arr[$module];
    }
// status of category return text
    function getStatusText($module, $statusVal, $need=null) {
        $arrStatus = arrStatus($module);
        $return = "";
        foreach ($arrStatus as $status) {
            if ($status['value'] == $statusVal) {
                if ($need != null) {
                    $return = $status[$need];
                }
                else {
                    $return = $status['text'];
                }
                break;
            }
        }

        return $return;
    }
// get recommend products
    function getRecommendProducts() {
        $query = DB::table('products')
            ->leftJoin('suppliers', 'suppliers.supplier_id', '=', 'products.supplier_id')
            ->leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
            ->leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
            ->select(DB::raw('products.*, 
            categories.name AS category_name, categories.slug AS category_slug, 
            suppliers.name AS supplier_name, 
            provinces.name AS province_name,
            (SELECT url FROM pictures WHERE products.product_id = pictures.product_id ORDER BY pictures.picture_id ASC LIMIT 1) AS thumbnail')
            )
            ->whereNull('categories.deleted_at')
            ->whereNull('suppliers.deleted_at')
            ->whereNull('products.deleted_at');

        $products = $query->get();

        return $products;
    }
// get category group 6
    function getCategoryGroup6() {
        $categories = DB::table('categories')
            ->select('category_id', 'name', 'slug', 'picture')
            ->whereNull('categories.deleted_at')
            ->where('categories.status', 1)
            ->orderBy('order', 'asc')
            ->orderBy('category_id', 'asc')
            ->get()->toArray();
        $group6 = array_chunk($categories, 6);

        return $group6;
    }
