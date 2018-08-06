<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view(WEBSITE_URL.'/'.getRoute('controller'));
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
        $saved = $contact->save();
        if (!$saved) {
            $request->session()->flash('danger', trans('adminbsb.send_contact_fail'));
        }
        else {
            $request->session()->flash('success', trans('adminbsb.send_contact_success'));
        }
        return back();
    }
}
