<?php

namespace App\Http\Controllers\thame\bloger;

use App\Comment;
use App\Http\Controllers\Controller;
use Form;
use Illuminate\Http\Request;
use Up;


class CommentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
//               return view('admin.comment.create',['title'=>trans('admin.create')]);
    }


    public function store() // اضافة تعليق جديد
    {
        $rules = [
            'content' => 'required',
            'status' => '',
            'url' => 'numeric|url',
            'post_id' => '',

        ];
        $data = $this->validate(request(), $rules, [], [
            'content' => trans('admin.content'),
            'status' => trans('admin.status'),
            'url' => trans('admin.url'),
            'post_id' => trans('admin.post_id'),

        ]);
        $data['user_id'] = \Auth::user()->id;
        $author = \Auth::user()->username;
        $data['author'] = $author;
        $data['email'] = \Auth::user()->email;
        $data['post_id'] = request('post_id');
        $data['status'] = 'yes';

        Comment::create($data);

        toastr()->success(trans('admin.Success'), trans('admin.added'));
//              return back();
        return response()->json($data);

    }


    public function show($id)
    {
        $comment = Comment::find($id);
        return view('blog.page.single_post', ['title' => trans('blog.comment'), 'comment' => $comment]);
    }


    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.edit', ['title' => trans('admin.edit'), 'comment' => $comment]);
    }


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
