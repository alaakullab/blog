<?php

namespace App\Http\Controllers\thame\home;

use App\HireComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
use App\HomeLogin;
use App\Hire;
use App\User;
use App\Role;
use Carbon\Carbon;
use Validator;
use Set;
use Up;
use Form;
use Storage;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        $HomeLogin = HomeLogin::find(1);
        return view('home.layouts.index' ,['HomeLogin'=>$HomeLogin,'title' => trans('admin.page_home')]);
    }
       public function partner_index()
    {
        $partner = Partner::find(1);
        return view('home.pages.partner' ,['title' => trans('admin.partner'),'partner'=>$partner]);
    }
    public function team_index($username)
    {
        $HomeLogin = HomeLogin::find(1);
        $user = User::where('username', $username)->where('teams', 'yes')->first();
        return view('home.pages.team.index', ['HomeLogin'=>$HomeLogin,'title' => trans('admin.team'), 'user' => $user, 'username' => $username]);
    }

    public function team_about()
    {
        $rules = [
            'Address' => '',
            'Gender' => 'required',
            'Phone' => '',
            'about_me' => '',
        ];
        $data = $this->validate(request(), $rules, [], [
            'Address' => awtTrans('admin.Address'),
            'Gender' => trans('admin.Gender'),
            'Phone' => trans('admin.Phone'),
            'about_me' => trans('admin.about_me'),
        ]);

        // return dd($user->Informations_draftsmans->Full_Name);
        $user = User::where('username', \Auth::user()->username)->first();
        $user->Informations_users_de->update($data);
        $data['success'] = trans('admin.updated');
        return response()->json($data);
//        return back();
    }

    public function hire_index(Request $request)
    {
        if ($request->search == "") {
            $hires = Hire::orderBy("id", "DESC")->paginate(2);
            return view('home.pages.hire', ['title' => trans('admin.hire'), 'hires' => $hires]);
        } else {
            $hires = Hire::where('description', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->orderBy("id", "DESC")
                ->paginate(2);
            return view('home.pages.hire', ['title' => trans('admin.hire'), 'hires' => $hires]);
        }
    }

    public function hire_post()
    {
        ini_set('max_execution_time', 3000);
        $data = $this->validate(request(), [
            'title' => 'required',
            'email' => 'required',
            'description' => 'required',
            'file' => 'required|' . it()->image(),
        ], [], [
            'title' => trans('admin.title_en'),
            'email' => trans('admin.mail'),
            'description' => trans('admin.desc'),
            'file' => trans('admin.Uimage'),
        ]);
        if (request()->hasFile('file')) {
            $data['file'] = it()->upload('file', 'hire');
        }
        $data['user_id'] = \Auth::user()->id;
        Hire::create($data);
        return redirect(url('/hire'));
    }

    public function hire_show($id)
    {
        $hire = Hire::find($id);
        return view('home.pages.view-hire', ['title' => trans('admin.hireshow'), 'hire' => $hire]);
    }

    public function hire_comment_store()
    {
        $rules = [
            'content' => 'required',
            'hire_id' => '',

        ];
        $data = $this->validate(request(), $rules, [], [
            'content' => trans('admin.content'),
            'status' => trans('admin.status'),
            'author' => trans('admin.author'),
            'email' => trans('admin.email'),
            'url' => trans('admin.url'),
            'hire_id' => trans('admin.hire_id'),

        ]);
        $data['user_id'] = \Auth::user()->id;
        $author = \Auth::user()->username;
        $data['author'] =  $author;
        $data['email'] = \Auth::user()->email;
        $data['hire_id'] = request('hire_id');
        $data['status'] = 'yes';

        HireComment::create($data);

        toastr()->success(trans('admin.Success'), trans('admin.added'));
        return response()->json($data);
    }


    public function User_create()
            {
              $rules = [
             'name'=>'required',
             'email'=>'required|unique:admins',
             'password'=>'required|min:6',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'email'=>trans('admin.email'),
             'password'=>trans('admin.password'),

              ]);
              $user = new User ;
              $user->name = request('name');
              $user->email = request('email');
              $user->password = bcrypt(request('password'));
              $user->save();
              //add Role
              $user->roles()->attach(Role::where('name','User')->first());

              auth()->guard('web')->login($user);
              return redirect('/');
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
        //
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
