<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\CommentDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Comment;
use Validator;
use Set;
use Up;
use Form;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class CommentController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(CommentDataTable $comment)
    {
        return $comment->render('admin.comment.index', ['title' => trans('admin.comment')]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.create', ['title' => trans('admin.create')]);
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
            'content' => 'required',
            'status' => '',
            'author' => 'required',
            'email' => 'required',
            'url' => 'numeric|url',
            'post_id' => '',

        ];
        $data = $this->validate(request(), $rules, [], [
            'content' => trans('admin.content'),
            'status' => trans('admin.status'),
            'author' => trans('admin.author'),
            'email' => trans('admin.email'),
            'url' => trans('admin.url'),
            'post_id' => trans('admin.post_id'),

        ]);

        $data['admin_id'] = admin()->user()->id;
        Comment::create($data);

        toastr()->success(trans('admin.Success'), trans('admin.added'));
        return redirect(aurl('comment'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.show', ['title' => trans('admin.show'), 'comment' => $comment]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.edit', ['title' => trans('admin.edit'), 'comment' => $comment]);
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
            'content' => 'required',
            'status' => '',
            'author' => 'required',
            'email' => 'required',
            'url' => 'numeric|url',
            'post_id' => '',

        ];
        $data = $this->validate(request(), $rules, [], [
            'content' => trans('admin.content'),
            'status' => trans('admin.status'),
            'author' => trans('admin.author'),
            'email' => trans('admin.email'),
            'url' => trans('admin.url'),
            'post_id' => trans('admin.post_id'),
        ]);
        $data['admin_id'] = admin()->user()->id;
        Comment::where('id', $id)->update($data);

        toastr()->success(trans('admin.Success'), trans('admin.updated'));
        return redirect(aurl('comment'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);


        @$comment->delete();
        toastr()->success(trans('admin.Success'), trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $comment = Comment::find($id);

                @$comment->delete();
            }
            toastr()->success(trans('admin.Success'), trans('admin.deleted'));
            return back();
        } else {
            $comment = Comment::find($data);


            @$comment->delete();
            toastr()->success(trans('admin.Success'), trans('admin.deleted'));
            return back();
        }
    }


}
