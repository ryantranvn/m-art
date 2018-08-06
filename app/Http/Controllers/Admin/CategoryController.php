<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::select('*');

        // search
        $searchValues = ['category_name' => '', 'status' => ''];
        if ($request->has('category_name')) {
            $searchValues['category_name'] = $request->category_name;
            $query->where('categories.name', 'like', '%'.$request->category_name.'%');
        }
        if ($request->has('status')) {
            $searchValues['status'] = $request->status != 1 ? 0 : 1;
            $query->where('categories.status', $searchValues['status']);
        }

        // sorting
        if ($request->has('sorting')) {
            $query->withSort($request->sorting, $request->by);
        }

        $categories = $query->paginate(15);

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.index',
            compact('categories', 'searchValues'));
    }

    public function create()
    {
        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.create',
            compact(''));
    }

    public function store(CategoryRequest $request)
    {
        // insert new
        $category = new Category;
            $category->parent_id = 0;
            $category->name = $request->category_name;
            $category->picture = $request->picture;
            $category->slug = str_slug($request->category_name);
            $category->description = $request->category_desc;
            $category->order = $request->order;
            $category->status = $request->status != 1 ? 0 : 1; // 1 is priority
            $category->created_by = Auth::user()->user_id;
        $saved = $category->save();
        if (!$saved) {
            $request->session()->flash('danger', trans('adminbsb.create_fail'));
            return back();
        }
        else {
            $request->session()->flash('success', trans('adminbsb.create_success'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }
    }

    public function show(Request $request, $id)
    {
        $category = Category::select('category_id', 'name', 'description', 'order', 'status')->find($id);
        if (!$category) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.show',
            compact('category'));
    }

    public function edit(Request $request, $id)
    {
        $category = Category::select('category_id', 'name', 'description', 'order', 'status')->find($id);
        if (!$category) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.edit',
            compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
        }
        else {
            $category->name = $request->category_name;
            $category->slug = str_slug($request->category_name);
            $category->picture = $request->picture;
            $category->description = $request->category_desc;
            $category->order = $request->order;
            $category->status = $request->status != 1 ? 0 : 1; // 1 is priority
            $category->updated_by = Auth::user()->user_id;
            $saved = $category->save();

            if (!$saved) {
                $request->session()->flash('danger', trans('adminbsb.edit_fail'));
                return back();
            }
            else {
                $request->session()->flash('success', trans('adminbsb.edit_success'));
            }
        }
        return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
        }
        else {
            $softDelete = $category->delete();
            if (!$softDelete) {
                $request->session()->flash('danger', trans('adminbsb.delete_fail'));
            }
            else {
                $request->session()->flash('success', trans('adminbsb.delete_success'));
            }
        }

        return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
    }
}
