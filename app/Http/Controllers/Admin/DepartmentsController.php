<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use Form;
use Illuminate\Http\Request;
use Set;
use Storage;
use Up;
use Validator;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class DepartmentsController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.department.index', ['title' => trans('admin.department')]);

    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create', ['title' => trans('admin.create')]);
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
            'dep_name_ar' => 'required',
            'dep_name_en' => 'required',
            'parent_id' => 'sometimes|nullable|numeric',
            'image_dep' => 'sometimes|nullable|' . it()->image(),
            'description_ar' => 'sometimes|nullable',
            'description_en' => 'sometimes|nullable',
            'keyword' => 'sometimes|nullable',

        ];
        $data = $this->validate(request(), $rules, [], [
            'dep_name_ar' => trans('admin.dep_name_ar'),
            'dep_name_en' => trans('admin.dep_name_en'),
            'parent_id' => trans('admin.parent_id'),
            'image_dep' => trans('admin.image_dep'),
            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'keyword' => trans('admin.keyword'),

        ]);
        // dd($data);
        $data['admin_id'] = admin()->user()->id;
        if (request()->hasFile('image_dep')) {
            $data['image_dep'] = it()->upload('image_dep', 'maindepartment');
            // $data['icon']=Up::upload([
            // // 'new_name'=>'',
            // 'file'=>'icon',
            // 'path'=>'departments',
            // 'upload_type'=>'single',
            // 'delete_file'=>' ',
            // ]);
        }
        Department::create($data);

        toastr()->success(trans('admin.Success'), trans('admin.added'));
        return redirect(aurl('departments'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        return view('admin.department.show', ['title' => trans('admin.show'), 'department' => $department]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit', ['title' => trans('admin.edit'), 'department' => $department]);
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
            'dep_name_ar' => 'required',
            'dep_name_en' => 'required',
            'parent_id' => 'sometimes|nullable|numeric',
            'image_dep' => 'sometimes|nullable|' . it()->image(),
            'description_ar' => 'sometimes|nullable',
            'description_en' => 'sometimes|nullable',
            'keyword' => 'sometimes|nullable',

        ];
        $data = $this->validate(request(), $rules, [], [
            'dep_name_ar' => trans('admin.dep_name_ar'),
            'dep_name_en' => trans('admin.dep_name_en'),
            'parent_id' => trans('admin.parent_id'),
            'image_dep' => trans('admin.image_dep'),
            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'keyword' => trans('admin.keyword'),

        ]);

        $data['admin_id'] = admin()->user()->id;
        if (request()->hasFile('image_dep')) {
            $data['image_dep'] = it()->upload('image_dep', 'maindepartment');
            // $data['icon']=Up::upload([
            // // 'new_name'=>'',
            // 'file'=>'icon',
            // 'path'=>'departments',
            // 'upload_type'=>'single',
            // 'delete_file'=>' ',
            // ]);
        }
        Department::where('id', $id)->update($data);

        toastr()->success(trans('admin.Success'), trans('admin.updated'));
        return redirect(aurl('departments'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */

    public static function delete_parent($id)
    {
        $department_parent = Department::where('parent_id', $id)->get();
        foreach ($department_parent as $sub) {
            self::delete_parent($sub->id);
            if (!empty($sub->icon)) {
                Storage::has($sub->icon) ? Storage::delete($sub->icon) : '';
            }
            $subdepartment = Department::find($sub->id);
            if (!empty($subdepartment)) {
                $subdepartment->delete();
            }
        }
        $dep = Department::find($id);

        if (!empty($dep->icon)) {
            Storage::has($dep->icon) ? Storage::delete($dep->icon) : '';
        }
        $dep->delete();
    }

    public function destroy($id)
    {
        self::delete_parent($id);
        // $dep=Department::find($id);
        // dd($dep);
        // @$dep->delete();
        toastr()->success(trans('admin.Success'), trans('admin.deleted'));
        return redirect(aurl('departments'));
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $department = Department::find($id);

                @$department->delete();
            }
            toastr()->success(trans('admin.Success'), trans('admin.deleted'));
            return back();
        } else {
            $department = Department::find($data);


            @$department->delete();
            toastr()->success(trans('admin.Success'), trans('admin.deleted'));
            return back();
        }
    }


}
