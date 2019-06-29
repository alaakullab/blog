<?php

namespace App\Http\Controllers\thame\bloger;

use App\Hire;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Post;
use App\Role;
use App\User;
use App\Tag;
use Form;
use Illuminate\Http\Request;
use Storage;
use Up;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function New_news()
    {
        $rules = [
            'email_news' => 'required|string|email|max:255',

        ];
        $data = $this->validate(request(), $rules, [], [
            'email_news' => trans('admin.email'),

        ]);
        New_news::create($data);
        return back();
    }

    public function search()
    {

        if (app('l') == 'en') {
            $post = Post::where('title_en', 'like', request('search') . '%')->orderBy('id', 'desc')->limit(9)->get();

        } else {
            $post = Post::where('title_ar', 'like', request('search') . '%')->orderBy('id', 'desc')->limit(9)->get();
        }
        return view('blog.pages.search', ['title' => trans('home.search_page'), 'posts' => $post,]);
    }

    public function loadDataAjaxsearch()
    {
        $output = '';
        $id = request('id');
        if (app('l') == 'en') {
            $posts = Post::where('title_en', 'like', request('search') . '%')->where('id', '<', $id)->orderBy('id', 'desc')->limit(9)->get();

        } else {
            $posts = Post::where('title_ar', 'like', request('search') . '%')->where('id', '<', $id)->orderBy('id', 'desc')->limit(9)->get();
        }
        if (!$posts->isEmpty()) {
            foreach ($posts as $post) {
                $url = url('bloger/post/' . $post->id);
                $username = $post->user->First_Name ? $post->user->First_Name . ' ' . $post->user->Last_Name : $post->user->username;
                if (app('l') == 'ar') {
                    $titlelang = $post->title_ar;
                    $postlang = $post->content_ar;
                    $tag = $post->tag->name_ar;
                } else {
                    $titlelang = $post->title_en;
                    $postlang = $post->content_en;
                    $tag = $post->tag->name_en;
                }

                $body = substr(strip_tags($postlang), 0, 500);
                $body .= strlen(strip_tags($postlang)) > 500 ? "..." : "";

                $output .= '<div>
                            <div class="post">
                                <h2><a href="' . $url . '"  >' . $titlelang . '</a></h2>
                                <p class="author-category">' . trans('awt.by') . ' <a href="/bloger/post/. $post->id "  >' . $username . '</a>' . trans('awt.in') . ' <a
                                        href="' . url('bloger/category/' . $post->tag->name_en) . '">' . $tag . '</a>
                                </p>
                                <hr/>
                                <p class="date-comments">
                                    <a href="' . $url . '"  ><i class="fa fa-calendar-o"></i>' . $post->created_at->toDayDateTimeString() . '</a>
                                    <a href="' . $url . '"    ><i class="fa fa-comment-o"></i> ' . count($post->comments) . ' ' . trans('awt.comments') . '</a>
                                </p>
                                <div class="image">
                                    <a href="' . $url . '"   >
                                        <img src="' . Storage::url($post->image_post) . '" class="img-responsive"
                                        alt="Example blog post alt"/>
                                    </a>
                                </div>
                                <p class="intro">' . $body . '</p>
                                <p class="read-more">
                                    <a href="' . $url . '"   class="btn btn-primary">' . trans('admin.continue_reading') . '</a>
                                </p>
                            </div>
                        </div>';
            }
            $output .= '<div class="pager" id="remove-row"  >
                            <button id="btn-more" data-id="' . $post->id . '" class="btn btn-primary btn-lg" >' . trans('admin.load_more') . '</button>
                        </div>
                        <br/>';
            echo $output;
        }
    }

    public function contact()
    {
        return view('blog.pages.contact', ['title' => trans('home.contact')]);
    }

    public function Register()
    {
        return view('blog.pages.register', ['title' => awTtrans('Register', 'ar')]);
    }

    public function Register_post()
    {
        $rules = [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ];
        $data = $this->validate(request(), $rules, [], [
            'username' => trans('admin.username'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),

        ]);
        $user = new User;
        $user->username = request('username');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();
        //add Role
        $user->roles()->attach(Role::where('name', 'User')->first());

        // session()->flash('success',trans('admin.added'));
        auth()->guard('web')->login($user);
        // auth()->guard('web')->attempt(['email' =>$data['email'], 'password' => $data['password']]);
        return redirect('bloger');
    }

    public function index()
    {
        $posts = Post::orderBy("created_at", "DESC")->limit(9)->get();
        return view('blog.layouts.index', ['title' => trans('admin.bloger'), 'posts' => $posts]);
    }

    public function posts_category_index($name)
    {
        $tag = Tag::where('name_en', $name)->value('id');
        $tagname = Tag::find($tag);

        $posts = Post::where('tag_id', $tag)->orderBy("id", "DESC")->limit(9)->get();
        return view('blog.pages.post', ['title' => awTtrans('categories', 'ar'), 'posts' => $posts, 'tagname' => $tagname]);
    }

    public function loadDataAjaxPosts()
    {
        $output = '';
        $id = request('id');
        $tag_id = request('tag_id');

        if ($tag_id) {
            $tag = Tag::where('id', $tag_id)->value('id');
            $posts = Post::where('id', '<', $id)->where('tag_id', $tag)->orderBy("id", "DESC")->limit(9)->get();
        } else {
            $posts = Post::where('id', '<', $id)->orderBy('created_at', 'DESC')->limit(9)->get();
        }
        if (!$posts->isEmpty()) {
            foreach ($posts as $post) {
                $url = url('bloger/post/' . $post->id);
                $username = $post->user->First_Name ? $post->user->First_Name . ' ' . $post->user->Last_Name : $post->user->username;

//                $editor = $post->user_id == \Auth::user()->id and \Auth::check() and \Auth::user()->hasRole('Editor') ? '<a href="" ><i class="fa fa-edit"></i></a>' : '' ;
                if (app('l') == 'ar') {
                    $titlelang = $post->title_ar;
                    $postlang = $post->content_ar;
                    $tag = $post->tag->name_ar;

                } else {
                    $titlelang = $post->title_en;
                    $postlang = $post->content_en;
                    $tag = $post->tag->name_en;

                }
                $body = substr(strip_tags($postlang), 0, 500);
                $body .= strlen(strip_tags($postlang)) > 500 ? "..." : "";

                $output .= '<div>
                            <div class="post">
                                <h2><a href="' . $url . '"  >' . $titlelang . '</a></h2>
                                <p class="author-category">' . trans('awt.by') . ' <a href="/bloger/post/. $post->id "  >' . $username . '</a> ' . trans('awt.in') . ' <a
                                        href="">' . $tag . '</a>
                                </p>
                                <hr/>
                                <p class="date-comments">
                                    <a href="' . $url . '"  ><i class="fa fa-calendar-o"></i>' . $post->created_at->toDayDateTimeString() . '</a>
                                    <a href="' . $url . '"    ><i class="fa fa-comment-o"></i>' . count($post->comments) . ' ' . trans('awt.comments') . '</a>
                                </p>
                                <div class="image">
                                    <a href="' . $url . '"   >
                                        <img src="/storage/' . $post->image_post . '" class="img-responsive"
                                        alt="Example blog post alt"/>
                                    </a>
                                </div>
                                <p class="intro">' . $body . '</p>
                                <p class="read-more">
                                    <a href="' . $url . '"   class="btn btn-primary">' . trans('admin.continue_reading') . '</a>
                                </p>
                            </div>
                        </div>';
            }
            if ($tag_id) {
                $output .= '<div class="pager" id="remove-row"  >
                            <button id="btn-more" data-id="' . $post->id . '" data-tagid="' . $post->tag_id . '" class="btn btn-primary btn-lg" >' . trans('admin.load_more') . '</button>
                        </div>
                        <br/>';
            } else {
                $output .= '<div class="pager" id="remove-row"  >
                            <button id="btn-more" data-id="' . $post->id . '" class="btn btn-primary btn-lg" >' . trans('admin.load_more') . '</button>
                        </div>
                        <br/>';
            }


            echo $output;
        }
    }

    public function partner_index()
    {
        $partner = Partner::find(1);
        return view('home.pages.partner', ['title' => trans('home.partner'), 'partner' => $partner]);
    }

    public function hire_index()
    {
        $title = trans('home.hire');
        // $hire = hire::find(1);
        return view('home.pages.hire', ['title' => trans('admin.hire')]);
    }

    public function hire_post()
    {
        $data = $this->validate(request(), [
            'email' => 'required',
            'description' => 'required',
            'file' => 'required|' . it()->image(),
        ], [], [
            'email' => trans('admin.mail'),
            'description' => trans('admin.desc'),
            'file' => trans('admin.Uimage'),
        ]);
        if (request()->hasFile('file')) {
            $data['file'] = it()->upload('file', 'hire');
        }
        // return dd($data);
        Hire::create($data);
        return redirect('/');
    }

    public function User_create()
    {
        $rules = [
            'username' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required|min:6',

        ];
        $data = $this->validate(request(), $rules, [], [
            'username' => trans('admin.username'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),

        ]);
        $user = new User;
        $user->username = request('username');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();
        //add Role
        $user->roles()->attach(Role::where('name', 'User')->first());
        auth()->guard('web')->login($user);
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rating()
    {
        if (request()->ajax()) {
            $ra = \willvincent\Rateable\Rating::where('user_id', \Auth::id())->first();
            if ($ra == null) {
                $post = Post::find(request('id'));
                $rating = new \willvincent\Rateable\Rating;
                $rating->rating = request('input-1');
                $rating->user_id = \Auth::user()->id;

                $post->ratings()->save($rating);
            } else {
                $post = Post::find(request('id'));
                $post->ratings()->delete($ra);
                $rating = new \willvincent\Rateable\Rating;
                $rating->rating = request('input-1');
                $rating->user_id = \Auth::user()->id;
                $post->ratings()->save($rating);

            }

        } else {
            $ra = \willvincent\Rateable\Rating::where('user_id', \Auth::id())->first();
            if ($ra == null) {
                $post = Post::find(request('id'));
                $rating = new \willvincent\Rateable\Rating;
                $rating->rating = request('input-1');
                $rating->user_id = \Auth::user()->id;

                $post->ratings()->save($rating);
            } else {
                $post = Post::find(request('id'));
                $post->ratings()->delete($ra);
                $rating = new \willvincent\Rateable\Rating;
                $rating->rating = request('input-1');
                $rating->user_id = \Auth::user()->id;
                $post->ratings()->save($rating);

            }
        }
        return response()->json($rating);
//        return back();
    }

    public function post_add()
    {
        return view('blog.pages.post_store', ['title' => trans('admin.add_post')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function post_store(Request $request)
    {
        if (app('l') == 'en') {
            $rules = [
                'title_' . app('l') => 'required',
                'content_' . app('l') => 'required',
                'title_ar' => 'sometimes|nullable|',
                'content_ar' => 'sometimes|nullable|',
                'status' => '',
                'user_id' => '',
                'tag_id' => 'required|numeric',
                'image_post' => 'sometimes|nullable|' . it()->image(),
                'keyword' => 'sometimes|nullable',

            ];
        } else {
            $rules = [
                'title_' . app('l') => 'required',
                'content_' . app('l') => 'required',
                'title_en' => 'sometimes|nullable|',
                'content_en' => 'sometimes|nullable|',
                'status' => '',
                'user_id' => '',
                'tag_id' => 'required|numeric',
                'image_post' => 'sometimes|nullable|' . it()->image(),
                'keyword' => 'sometimes|nullable',

            ];
        }

        $data = $this->validate(request(), $rules, [], [
            'title_en' => trans('admin.title_en'),
            'content_en' => trans('admin.content_en'),
            'tilte_ar' => trans('admin.tilte_ar'),
            'content_ar' => trans('admin.content_ar'),
            'status' => trans('admin.status'),
            'user_id' => trans('admin.user_id'),
            'tag_id' => trans('admin.tag_id'),
            'keyword' => trans('admin.keyword'),
            'image_post' => trans('admin.image_post'),

        ]);

        $data['user_id'] = \Auth::user()->id;
        $data['status'] = 'yes';
        if (request()->hasFile('image_post')) {
            $data['image_post'] = it()->upload('image_post', 'post');
        }
        Post::create($data);

        session()->flash('success', trans('admin.added'));
        return redirect('bloger');
    }

    public function post_edit($id)
    {
        $post = Post::find($id);
        return view('blog.pages.post_edit', ['title' => trans('admin.post_edit'), 'post' => $post]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * update a newly created resource in storage.
     * @param \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function post_update($id)
    {
        $post = Post::find($id);
        if (app('l') == 'en') {
            $rules = [
                'title_' . app('l') => 'required',
                'content_' . app('l') => 'required',
                'title_ar' => 'sometimes|nullable|',
                'content_ar' => 'sometimes|nullable|',
                'status' => '',
                'user_id' => '',
                'tag_id' => 'required|numeric',
                'image_post' => 'sometimes|nullable|' . it()->image(),
                'keyword' => 'sometimes|nullable',

            ];
        } else {
            $rules = [
                'title_' . app('l') => 'required',
                'content_' . app('l') => 'required',
                'title_en' => 'sometimes|nullable|',
                'content_en' => 'sometimes|nullable|',
                'status' => '',
                'user_id' => '',
                'tag_id' => 'required|numeric',
                'image_post' => 'sometimes|nullable|' . it()->image(),
                'keyword' => 'sometimes|nullable',

            ];
        }
        $data = $this->validate(request(), $rules, [], [
            'title_en' => trans('admin.title_en'),
            'content_en' => trans('admin.content_en'),
            'title_ar' => trans('admin.title_ar'),
            'content_ar' => trans('admin.content_ar'),
            'status' => trans('admin.status'),
            'user_id' => trans('admin.user_id'),
            'tag_id' => trans('admin.tag_id'),
            'keyword' => trans('admin.keyword'),
            'image_post' => trans('admin.image_post'),

        ]);
        if (isset(admin()->user()->id)) {

            $data['admin_id'] = admin()->user()->id;
        }
        if (request()->hasFile('image_post')) {
            Storage::has($post->image_post) ? Storage::delete($post->image_post) : '';
            $data['image_post'] = it()->upload('image_post', 'post');

        }
        Post::where(['id' => $id, 'user_id' => \Auth::user()->id])->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect('bloger/post/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
