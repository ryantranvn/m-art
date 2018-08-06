<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscribe;
use DB;

class SubscribeController extends Controller
{
    public function index(Request $request)
    {
        $query = Subscribe::leftJoin('users', 'users.email', '=', 'subscribes.email')
            ->select('subscribes.*');

        $searchValues = ['email' => '', 'status' => ''];
        if ($request->has('email')) {
            $searchValues['email'] = $request->email;
            $query->where('subscribes.email', 'like', '%'.$request->email.'%');
        }
        if ($request->has('status')) {
            $searchValues['status'] = $request->status != 1 ? 0 : 1;
            $query->where('subscribes.status', $searchValues['status']);
        }
        // sorting
        if ($request->has('sorting')) {
            $query->withSort($request->sorting, $request->by);
        }

        $subscribes = $query->paginate(15);

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.index',
            compact('searchValues', 'subscribes'));
    }

    public function destroy(Request $request, $id)
    {
        $subscribe = Subscribe::find($id);
        if (!$subscribe) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
        }
        else {
            DB::beginTransaction();
            try {
                $deleted = $subscribe->delete();
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
