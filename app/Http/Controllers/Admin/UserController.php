<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Informations_users;
use App\Role;
use App\User;
use DB;
use Form;
use Illuminate\Http\Request;
use Up;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class UserController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $user)
    {
        return $user->render('admin.user.index', ['title' => trans('admin.user')]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', ['title' => trans('admin.create')]);
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
            'username' => 'required|max:255|unique:users',
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            'username' => trans('admin.username'),
            'First_Name' => trans('admin.First_Name'),
            'Last_Name' => trans('admin.Last_Name'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),
            'role' => trans('admin.role'),

        ]);
        // $data['password']= bcrypt(request('password'));
        //   user::create($data);
        $user = new User;
        $user->username = request('username');
        $user->First_Name = request('First_Name');
        $user->Last_Name = request('Last_Name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        @$user->save();
        $user->roles()->attach(Role::where('name', request('role'))->first());
        if (request('role') == 'Draftsman') {
            $draftsman = new Informations_users;
            $draftsman->about_me = '';
            $draftsman->Address = '';
            $draftsman->type_file = 'Draftsman';
            $draftsman->user_id = $user->id;
            @$draftsman->save();
        }
        session()->flash('success', trans('admin.added'));
        return redirect(aurl('user'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::find($id);
        return view('admin.user.show', ['title' => trans('admin.show'), 'user' => $user]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);
        return view('admin.user.edit', ['title' => trans('admin.edit'), 'user' => $user]);
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
            'username' => 'required|max:255|unique:users,id' . $id,
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'email' => 'required|email|unique:users,id,' . $id,
            // 'password' => 'required|min:6',
            // 'role' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            'username' => trans('admin.username'),
            'First_Name' => trans('admin.First_Name'),
            'Last_Name' => trans('admin.Last_Name'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),
            'role' => trans('admin.role'),

        ]);

        if (request('password')) {
            $data['password'] = bcrypt(request('password'));
        }
        if (request('teams')) {
          if(Informations_users::where('user_id', $id)->where('type_file','Teams')->first())
          {

          }else{
            $data['teams'] = 'yes';
            $draftsmann = new Informations_users;
            $draftsmann->about_me = '';
            $draftsmann->Address = '';
            $draftsmann->type_file = 'Teams';
            $draftsmann->user_id = $id;
            @$draftsmann->save();
          }



        } else {
            @Informations_users::where('user_id', $id)->where('type_file','Teams')->delete();
            $data['teams'] = 'no';

        }
        //          $user = new User ;
        //         $user->name = $data['name'];
        //         $user->email = $data['email'];
        //         if(request('password'))
        //         {
        //         $user->password = $data['password'];
        // }
        //         $user->teams = $data['teams'];
        //         $user->save();
        $user = User::where('id', $id)->update($data);
        $role = Role::where('name', request('role'))->first();
        $dra = Informations_users::where('user_id', $id)->where('type_file','Draftsman')->first();
        if (request('role') == 'User' or request('role') == 'Editor' ) {
          @Informations_users::where('user_id', $id)->where('type_file','Draftsman')->delete();

}
        if (request('role') == 'Draftsman') {

            if ($dra) {

            } else {
                $draftsman = new Informations_users;
                $draftsman->about_me = '';
                $draftsman->Address = '';
                $draftsman->type_file = 'Draftsman';
                $draftsman->user_id = $id;
                @$draftsman->save();
            }
        }

// return dd($role);
        @DB::table('user_role')->where('user_id', $id)->update(['role_id' => $role->id]);
        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('user'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

      $user->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $user = User::find($id);

                @$user->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $user = User::find($data);

            @$user->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }

}
