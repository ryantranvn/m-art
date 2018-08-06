<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use Auth;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $query = Supplier::leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
                        ->select('suppliers.*', 'provinces.name AS province_name');

        $searchValues = ['name' => '', 'province_id' => '', 'status' => ''];
        if ($request->has('name')) {
            $searchValues['name'] = $request->name;
            $query->where('suppliers.name', 'like', '%'.$request->name.'%');
        }
        if ($request->has('status')) {
            $searchValues['status'] = $request->status != 1 ? 0 : 1;
            $query->where('suppliers.status', $searchValues['status']);
        }
        if ($request->has('province_id')) {
            $searchValues['province_id'] = $request->province_id;
            $query->where('suppliers.province_id', $request->province_id);
        }
        // sorting
        if ($request->has('sorting')) {
            if ($request->sorting == 'province_id') {
                $query->withSort('provinces.province_id', $request->by);
            }
            else {
                $query->withSort($request->sorting, $request->by);
            }
        }

        $suppliers = $query->paginate(15);

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.index',
            compact('searchValues', 'suppliers'));
    }

    public function create()
    {
        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.create',
            compact(''));
    }

    public function store(SupplierRequest $request)
    {
        $supplier = new Supplier;
            $supplier->name = $request->name;
            $supplier->status = $request->status != 1 ? 0 : 1;
            $supplier->description = $request->description;
            $supplier->introduction = $request->introduction;
            $supplier->province_id = $request->province_id;
            $supplier->thumbnail = $request->picture;
            $supplier->created_by = Auth::user()->user_id;
        $saved = $supplier->save();
        if (!$saved) {
            $request->session()->flash('danger', trans('adminbsb.create_fail'));
            return back();
        }
        else {
            $request->session()->flash('success', trans('adminbsb.create_success'));
        }
        return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
    }

    public function show(Request $request, $id)
    {
        $supplier = Supplier::leftJoin('provinces', 'provinces.province_id', '=', 'suppliers.province_id')
                            ->select('suppliers.*', 'provinces.name AS province_name')
                            ->find($id);
        if (!$supplier) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.show',
            compact('supplier'));
    }

    public function edit(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.edit',
            compact('supplier'));
    }

    public function update(SupplierRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
        }
        else {
            $supplier->name = $request->name;
            $supplier->status = $request->status != 1 ? 0 : 1;
            $supplier->description = $request->description;
            $supplier->introduction = $request->introduction;
            $supplier->province_id = $request->province_id;
            $supplier->thumbnail = $request->picture;
            $supplier->updated_by = Auth::user()->user_id;
            $saved = $supplier->save();
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

    public function destroy($id)
    {
        dd('This function is developing...');
    }
}
