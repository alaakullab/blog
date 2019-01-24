<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('blog.layouts.index' ,['title' => trans('blog.page_blog')]);

        $posts = Post::orderBy("id" , "DESC")->paginate(9);
        return response()->json($posts);
    }
    public function categorypost($name)
    {
        $tag = Tag::where('name_en', $name)->value('id');
        $posts = Post::where('tag_id', $tag)->orderBy("id" , "DESC")->paginate(9);
        return response()->json($posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
 
       if(app('l') == 'en')
       {
           $title = $post->title_en;
       }else{
             $title = $post->title_ar;

       }
        return view('blog.pages.single_post',['title'=>$title,'post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
