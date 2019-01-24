<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Send;
use App\New_news;
use Form;
use Illuminate\Http\Request;
use Mail;
use Set;
use Storage;
use Up;
use Validator;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class SendController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.send.index', ['title' => trans('admin.send_email')]);
    }


    public function store()
    {
        $rules = [
            'title' => 'required',
            'email' => 'sometimes|nullable|string|email|max:255',
            'desc' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            'title' => trans('admin.title'),
            'email' => trans('admin.email'),
            'desc' => trans('admin.desc'),

        ]);

        $title = $data['title'];
        $desc = $data['desc'];
        $email = $data['email'];
        if ($email != null) {
            Mail::to($email)->send(new Send($desc, $title));
            session()->flash('success', trans('admin.send_email'));

            return back();

        } else {
            $send = New_news::get();
            foreach ($send as $send) {
                Mail::to($send->email_news)->send(new Send($desc, $title));
            }
            session()->flash('success', trans('admin.send_all'));

            return back();
        }
    }


    public function destroy($id)
    {
        $Hire = Hire::find($id);
        if (!empty($Hire->file)) {
            Storage::has($Hire->file) ? Storage::delete($Hire->file) : '';
        }

        @$Hire->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $Hire = Hire::find($id);
                if (!empty($Hire->file)) {
                    Storage::has($Hire->file) ? Storage::delete($Hire->file) : '';
                }
                @$Hire->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $Hire = Hire::find($data);

            if (!empty($Hire->file)) {
                Storage::has($Hire->file) ? Storage::delete($Hire->file) : '';
            }
            @$Hire->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }


}
