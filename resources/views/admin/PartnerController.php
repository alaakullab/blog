<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Partner;
use Form;
use Set;
use Storage;
use Up;
use Validator;

class PartnerController extends Controller
{
    public function index()
    {
        return view('admin.partner.index', ['title' => trans('admin.Partner')]);
    }


    public function update($id)
    {
        $rules = [
            'title_en' => 'sometimes|nullable',
            'title_ar' => 'sometimes|nullable',
            'desc_en' => 'required',
            'desc_ar' => 'required',
            'image' => 'sometimes|nullable|' . it()->image(),
        ];
        $data = $this->validate(request(), $rules, [], [
            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'desc_ar' => trans('admin.desc_ar'),
            'desc_en' => trans('admin.desc_en'),
            'image' => trans('admin.image'),

        ]);
        if (request()->hasFile('image')) {
            $data['image'] = it()->upload('image', 'partner');
        }

        $data['admin_id'] = admin()->user()->id;

        Partner::where('id', $id)->update($data);

        toastr()->success(trans('admin.Success'), trans('admin.updated'));
        return redirect(aurl('partner'));
    }


}
