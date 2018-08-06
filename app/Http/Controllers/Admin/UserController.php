<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::select('*')->where('users.type', '<>', 'admin');

        // search
        $searchValues = ['name' => '', 'email' => '', 'status' => ''];
        if ($request->has('name')) {
            $searchValues['name'] = $request->name;
            $query->where('users.name', 'like', '%'.$request->name.'%');
        }
        if ($request->has('email')) {
            $searchValues['email'] = $request->email;
            $query->where('users.email', 'like', '%'.$request->email.'%');
        }
        if ($request->has('status')) {
            $searchValues['status'] = $request->status != 1 ? 0 : 1;
            $query->where('users.status', $searchValues['status']);
        }

        // sorting
        if ($request->has('sorting')) {
            $query->withSort($request->sorting, $request->by);
        }

        $users = $query->paginate(15);

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.index',
            compact('searchValues', 'users'));
    }

    public function create()
    {
        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.create',
            compact(''));
    }

    public function store(UserRequest $request)
    {
        // insert new
        $user = new User;
            $user->name = $request->name;
            $user->status = $request->status != 1 ? 0 : 1;
            $user->email = strtolower(trim($request->email));
            $user->password = bcrypt($request->password);
            $user->province_id = $request->province;
            $user->district_id = $request->district;
            $user->address = $request->address;
            $user->type = USER_TYPE_USER;
            $user->created_by = Auth::user()->user_id;
        $saved = $user->save();
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
        $user = User::leftJoin('provinces', 'provinces.province_id', '=', 'users.province_id')
            ->leftJoin('districts', 'districts.district_id', '=', 'users.district_id')
            ->select('users.*',
                'provinces.name AS province_name',
                'districts.name AS district_name', 'districts.type AS district_type'
            )
            ->find($id);
        if (!$user) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.show',
            compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
            return redirect(url(BULK_SYSTEM.'/'.getRoute('controller')));
        }

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.edit',
            compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
        }
        else {
            $user->name = $request->name;
            $user->status = $request->status != 1 ? 0 : 1;
            $user->email = strtolower(trim($request->email));
            $user->province_id = $request->province;
            $user->district_id = $request->district;
            $user->address = $request->address;
            $user->updated_by = Auth::user()->user_id;
            $saved = $user->save();
            if ($saved) {
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
