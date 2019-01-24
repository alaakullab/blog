<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\ContactDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Contact;
use Validator;
use Set;
use Up;
use Form;
use Storage;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class ContactController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(ContactDataTable $Contact)
    {
        return $Contact->render('admin.contact.index', ['title' => trans('admin.Contact')]);
    }


    public function show($id)
    {
        $Contact = Contact::find($id);
        return view('admin.contact.show', ['title' => trans('admin.show'), 'contact' => $Contact]);
    }

    public function store()
    {
        $rules = [
            'full_name' => 'required',
            'message' => 'required',
            'email_contacts' => 'required|string|email|max:255',

        ];
        $data = $this->validate(request(), $rules, [], [
            'full_name' => trans('admin.full_name'),
            'email_contacts' => trans('admin.email'),
            'message' => trans('admin.message'),

        ]);
        Contact::create($data);
        return back();
    }


    public function destroy($id)
    {
        $Contact = Contact::find($id);
        if (!empty($Contact->file)) {
            Storage::has($Contact->file) ? Storage::delete($Contact->file) : '';
        }

        @$Contact->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $Contact = Contact::find($id);
                if (!empty($Contact->file)) {
                    Storage::has($Contact->file) ? Storage::delete($Contact->file) : '';
                }
                @$Contact->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $Contact = Contact::find($data);

            if (!empty($Contact->file)) {
                Storage::has($Contact->file) ? Storage::delete($Contact->file) : '';
            }
            @$Contact->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }


}
