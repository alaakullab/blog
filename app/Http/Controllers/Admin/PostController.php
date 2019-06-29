<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostDataTable;
use App\Http\Controllers\Controller;
use App\Post;
use Form;
use Illuminate\Http\Request;
use Storage;
use Up;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class PostController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(PostDataTable $post)
    {
        if (request()->has('softdelete')) {
            return $post->render('admin.post.index', ['title' => trans('admin.post_softdelete')]);
        } else {

            return $post->render('admin.post.index', ['title' => trans('admin.post')]);
        }
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create', ['title' => trans('admin.create')]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function store()  // اضافة مقال جديد
    {
        if(app('l') == 'en')  // لو لغة الموقع الانجليزية
        {
        $rules = [
            'title_' . app('l') => 'required',
            'content_' . app('l') => 'required',
            'title_ar' => '',
            'content_ar'  => '',
            'status' => '',
            'user_id' => '',
            'tag_id' => 'required|numeric',
            'image_post' => 'sometimes|nullable|' . it()->image(),
            'keyword' => 'sometimes|nullable',

        ];
        }else{
            $rules = [
                'title_' . app('l') => 'required',
                'content_' . app('l') => 'required',
                'title_en' => '',
                'content_en'  => '',
                'status' => '',
                'user_id' => '',
                'tag_id' => 'required|numeric',
                'image_post' => 'sometimes|nullable|' . it()->image(),
                'keyword' => 'sometimes|nullable',
                ];
        }
        $data = $this->validate(request(), $rules, [], [
            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'content_en' => trans('admin.content_en'),
            'content_ar' => trans('admin.content_ar'),
            'status' => trans('admin.status'),
            'user_id' => trans('admin.user_id'),
            'tag_id' => trans('admin.tag_id'),
            'keyword' => trans('admin.keyword'),
            'image_post' => trans('admin.image_post'),

        ]);

        $data['admin_id'] = admin()->user()->id;
        $data['user_id'] = '1';
        if (request('status')) {
            $data['status'] = 'yes';

        } else {
            $data['status'] = 'no';
        }
        if (request()->hasFile('image_post')) {
            $data['image_post'] = it()->upload('image_post', 'post');
        }
        Post::create($data);

        session()->flash('success', trans('admin.added'));
        return redirect(aurl('post'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show', ['title' => trans('admin.show'), 'post' => $post]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', ['title' => trans('admin.edit'), 'post' => $post]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * update a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $p = Post::find($id);

  if(app('l') == 'en')
  {
    $rules = [
        'title_' . app('l') => 'required',
        'content_' . app('l') => 'required',
        'title_ar' => '',
        'content_ar' => '',
        'status' => '',
        'user_id' => '',
        'tag_id' => 'required|numeric',
        'image_post' => 'sometimes|nullable|' . it()->image(),
        'keyword' => 'sometimes|nullable',

    ];
  }else{
    $rules = [
        'title_' . app('l') => 'required',
        'content_' . app('l') => 'required',
        'title_en' => '',
        'content_en' => '',
        'status' => '',
        'user_id' => '',
        'tag_id' => 'required|numeric',
        'image_post' => 'sometimes|nullable|' . it()->image(),
        'keyword' => 'sometimes|nullable',

    ];
  }
        $data = $this->validate(request(), $rules, [], [
            'title_en' => trans('admin.title_en'),
            'title_ar' => trans('admin.title_ar'),
            'content_en' => trans('admin.content_en'),
            'content_ar' => trans('admin.content_ar'),
            'status' => trans('admin.status'),
            'user_id' => trans('admin.user_id'),
            'tag_id' => trans('admin.tag_id'),
            'keyword' => trans('admin.keyword'),
            'image_post' => trans('admin.image_post'),

        ]);
        $data['admin_id'] = admin()->user()->id;
        if (request('status')) {
            $data['status'] = 'yes';

        } else {
            $data['status'] = 'no';
        }
        if (request()->hasFile('image_post')) {
          Storage::has($p->image_post)?Storage::delete($p->image_post):'';

            $data['image_post'] = it()->upload('image_post', 'post');
        }

        Post::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated'));

       return redirect(aurl('post'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function recovery($id)
    {
        Post::where('id', $id)->restore();
        return back();

    }

    public function image_post($id)
    {
        $post = Post::find($id);

        if (!empty($post->image_post)) {
            Storage::has($post->image_post) ? Storage::delete($post->image_post) : '';

        }
        $post->image_post = null ;
        $post->save();
        session()->flash('success', trans('admin.deleted_image'));
        return back();


    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (request()->has('delete')) {
            Post::where('id', $id)->forceDelete();
            session()->flash('success', trans('admin.deleted'));
  return back();

        } else {
            if (!empty($post->image_post)) {
                Storage::has($post->image_post) ? Storage::delete($post->image_post) : '';
            }

            @$post->delete();
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
                    Post::where('id', $id)->restore();

                }
                session()->flash('success', trans('admin.recovered'));
                return back();
            }
        }
        if (is_array($data)) {
            if (request()->has('delete')) {
                foreach ($data as $id) {
                    $post = Post::find($id);
                    if (!empty($post->image_post)) {
                        Storage::has($post->image_post) ? Storage::delete($post->image_post) : '';
                    }
                    Post::where('id', $id)->forceDelete();
                }
                session()->flash('success', trans('admin.deleted'));
                return back();

            }
            foreach ($data as $id) {
                $post = Post::find($id);
                if (!empty($post->image_post)) {
                    Storage::has($post->image_post) ? Storage::delete($post->image_post) : '';
                }

                @$post->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $post = Post::find($data);
            if (!empty($post->image_post)) {
                Storage::has($post->image_post) ? Storage::delete($post->image_post) : '';
            }

            @$post->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }

}
