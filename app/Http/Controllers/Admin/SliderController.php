<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Slider;
use Form;
use Set;
use Storage;
use Up;
use Validator;

class SliderController extends Controller
{
    public function index(SliderDataTable $Slider)
    {
        return $Slider->render('admin.slider.index', ['title' => trans('admin.slider')]);
    }


    public function show($id)
    {
        $Slider = Slider::find($id);
        return view('admin.slider.show', ['title' => trans('admin.show'), 'slider' => $Slider]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Slider = Slider::find($id);
        return view('admin.slider.edit', ['title' => trans('admin.edit'), 'slider' => $Slider]);
    }

    public function update($id)
    {
      $s = Slider::find($id);
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
        if (request()->hasFile('image_slider')) {
          Storage::has($s->image_slider)?Storage::delete($s->image_slider):'';

            $data['image_slider'] = it()->upload('image_slider', 'slider/'.$s->type_file);
        }
        Slider::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('slider'));
    }


}
