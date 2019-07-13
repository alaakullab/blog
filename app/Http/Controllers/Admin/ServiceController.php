<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Service;
use Form;
use Set;
use Storage;
use Up;
use Validator;

class ServiceController extends Controller
{
    public function index(ServiceDataTable $service)
    {
        return $service->render('admin.service.index', ['title' => trans('admin.service')]);
    }


    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.service.show', ['title' => trans('admin.show'), 'service' => $service]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', ['title' => trans('admin.edit'), 'service' => $service]);
    }

    public function update($id)
    {
        $rules = [
            'tilte_en' => 'sometimes|nullable|',
            'tilte_ar' => 'sometimes|nullable|',
            'desc_en' => 'required',
            'desc_ar' => 'required',


        ];
        $data = $this->validate(request(), $rules, [], [
            'title_ar' => trans('admin.tilte_en'),
            'title_en' => trans('admin.content_en'),
            'desc_ar' => trans('admin.desc_ar'),
            'desc_en' => trans('admin.desc_en'),

        ]);
        $data['admin_id'] = admin()->user()->id;
        service::where('id', $id)->update($data);

        toastr()->success(trans('admin.Success'), trans('admin.updated'));
        return redirect(aurl('service'));
    }


}
