<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\HomeLogin;
use Validator;
use Set;
use Up;
use Form;
use Storage;

class Home_loginController extends Controller
{
    public function index()
    {
        $home = HomeLogin::find(1);
        return view('admin.home_login.index', ['home'=> $home ,'title' => trans('admin.home_login')]);
    }


    public function update($id)
    {
        $rules = [
            'title_en' => 'sometimes|nullable',
            'title_ar' => 'sometimes|nullable',
            'name_title1_en' => 'required',
            'name_title1_ar' => 'required',
            'name_desc1_en' => 'required',
            'name_desc1_ar' => 'required',
            'name_title2_en' => 'required',
            'name_title2_ar' => 'required',
            'name_desc2_en' => 'required',
            'name_desc2_ar' => 'required',
            'name_title3_en' => 'required',
            'name_title3_ar' => 'required',
            'name_desc3_en' => 'required',
            'name_desc3_ar' => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'name_title1_en' => trans('admin.name_title1_en'),
            'name_title1_ar' => trans('admin.name_title1_ar'),
            'name_desc1_en' => trans('admin.name_desc1_en'),
            'name_desc1_ar' => trans('admin.name_desc1_ar'),
            'name_title2_en' => trans('admin.name_title2_en'),
            'name_title2_ar' => trans('admin.name_title2_ar'),
            'name_desc2_en' => trans('admin.name_desc2_en'),
            'name_desc2_ar' => trans('admin.name_desc2_ar'),
            'name_title3_en' => trans('admin.name_title3_en'),
            'name_title3_ar' => trans('admin.name_title3_ar'),
            'name_desc3_en' => trans('admin.name_desc3_en'),
            'name_desc3_ar' => trans('admin.name_desc3_ar'),

        ]);
   

              

        HomeLogin::where('id',$id)->update($data);

              toastr()->success(trans('admin.Success'),trans('admin.updated'));
        return back();
    }


}
