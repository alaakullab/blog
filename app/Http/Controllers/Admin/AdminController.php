<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\AdminDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Admin;
use Validator;
use Set;
use Up;
use Form;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class AdminController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDataTable $Admin)
    {
        return $Admin->render('admin.Admin.index', ['title' => trans('admin.Admin')]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Admin.create', ['title' => trans('admin.create')]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',

        ];
        $data = $this->validate(request(), $rules, [], [
            'name' => trans('admin.name'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),

        ]);
        $data['password'] = bcrypt(request('password'));
        Admin::create($data);

        toastr()->success(trans('admin.Success'), trans('admin.added'));
        return redirect(aurl('Admin'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Admin = Admin::find($id);
        return view('admin.Admin.show', ['title' => trans('admin.show'), 'Admin' => $Admin]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Admin = Admin::find($id);
        return view('admin.Admin.edit', ['title' => trans('admin.edit'), 'Admin' => $Admin]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * update a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6'


        ];
        $data = $this->validate(request(), $rules, [], [
            'name' => trans('admin.name'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),
        ]);
        $data['password'] = bcrypt(request('password'));
        Admin::where('id', $id)->update($data);

        toastr()->success(trans('admin.Success'), trans('admin.updated'));
        return redirect(aurl('Admin'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Admin = Admin::find($id);


        @$Admin->delete();
        toastr()->success(trans('admin.Success'), trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $Admin = Admin::find($id);

                @$Admin->delete();
            }
            toastr()->success(trans('admin.Success'), trans('admin.deleted'));
            return back();
        } else {
            $Admin = Admin::find($data);


            @$Admin->delete();
            toastr()->success(trans('admin.Success'), trans('admin.deleted'));
            return back();
        }
    }


}
