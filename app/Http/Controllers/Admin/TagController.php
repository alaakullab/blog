<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TagDataTable;
use App\Http\Controllers\Controller;
use App\Tag;
use Form;
use Illuminate\Http\Request;
use Up;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class TagController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(TagDataTable $tag)
    {
        if (request()->has('softdelete')) {
            return $tag->render('admin.tag.index', ['title' => trans('admin.tag_softdelete')]);
        } else {

            return $tag->render('admin.tag.index', ['title' => trans('admin.tag')]);
        }
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create', ['title' => trans('admin.create')]);
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
            'name_en' => 'required',
            'name_ar' => 'required',
            'frequency' => '',

        ];
        $data = $this->validate(request(), $rules, [], [
            'name_en' => trans('admin.name_en'),
            'name_ar' => trans('admin.name_ar'),
            'frequency' => trans('admin.frequency'),

        ]);

        $data['admin_id'] = admin()->user()->id;
        Tag::create($data);

        session()->flash('success', trans('admin.added'));
        return redirect(aurl('tag'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.show', ['title' => trans('admin.show'), 'tag' => $tag]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', ['title' => trans('admin.edit'), 'tag' => $tag]);
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'frequency' => '',

        ];
        $data = $this->validate(request(), $rules, [], [
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'frequency' => trans('admin.frequency'),
        ]);
        $data['admin_id'] = admin()->user()->id;
        Tag::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('tag'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function recovery($id)
    {
        Tag::where('id', $id)->restore();
        return back();

    }

    public function destroy($id)
    {
        $Tag = Tag::find($id);

        if (request()->has('delete')) {

            Tag::where('id', $id)->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();

        } else {
          if (!empty($Tag->image_tag)) {
              Storage::has($Tag->image_tag) ? Storage::delete($Tag->image_tag) : '';
          }
            @$Tag->forceDelete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }

    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (request()->has('recovery')) {
            if (is_array($data)) {
                foreach ($data as $id) {
                    Tag::where('id', $id)->restore();

                }
                session()->flash('success', trans('admin.recovered'));
                return back();
            }
        }
        if (is_array($data)) {
            if (request()->has('delete')) {
                foreach ($data as $id) {
                    $Tag = Tag::find($id);
                    if (!empty($Tag->image_tag)) {
                        Storage::has($Tag->image_tag) ? Storage::delete($Tag->image_tag) : '';
                    }
                    Tag::where('id', $id)->forceDelete();
                }
                session()->flash('success', trans('admin.deleted'));
                return back();

            }
            foreach ($data as $id) {
                $tag = Tag::find($id);

                @$tag->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $tag = Tag::find($data);

            @$tag->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }

}
