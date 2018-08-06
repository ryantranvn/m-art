<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use DB;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::select('*');
        $searchValues = ['name' => '', 'email' => '', 'status' => ''];
        if ($request->has('name')) {
            $searchValues['name'] = $request->name;
            $query->where('contacts.name', 'like', '%'.$request->name.'%');
        }
        if ($request->has('email')) {
            $searchValues['email'] = $request->email;
            $query->where('contacts.email', 'like', '%'.$request->email.'%');
        }
        if ($request->has('status')) {
            $searchValues['status'] = $request->status != 1 ? 0 : 1;
            $query->where('contacts.status', $searchValues['status']);
        }
        // sorting
        if ($request->has('sorting')) {
            $query->withSort($request->sorting, $request->by);
        }

        $contacts = $query->paginate(15);

        return view(BULK_SYSTEM_THEME.'/'.getRoute('controller').'.index',
            compact('searchValues', 'contacts'));
    }

    public function destroy(Request $request, $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            $request->session()->flash('danger', trans('adminbsb.not_found_data'));
        }
        else {
            DB::beginTransaction();
            try {
                $deleted = $contact->delete();
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
