<?php

namespace App\Http\Controllers\thame\home;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Form;
use Illuminate\Http\Request;
use Storage;
use Up;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home.layouts.index', ['title' => trans('admin.page_home')]);
	}
	public function login_index() {
		return view('blog.login', ['title' => trans('admin.login')]);
	}
	public function login_post() {
		// $rules = [
		// 	'name' => 'required',
		// 	'email' => 'required|string|email|max:255',
		// 	'password' => 'required|min:6',

		// ];
		// $data = $this->validate(request(), $rules, [], [
		// 	'name' => trans('admin.name'),
		// 	'email' => trans('admin.email'),
		// 	'password' => trans('admin.password'),

		// ]);
		// $this->guard()->attempt(
		// 	$this->credentials(['email' => request('email'), 'password' => request('password')])
		// );
		// auth()->guard('web')->attempt();
		$rememberme = true;
		if (!auth()->guard('web')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
			return back()->withErrors([
				'massage' => 'Email or password not correct !!',
			]);
		}
		return redirect('/bloger');

	}
	public function logout() {
		auth()->guard('web')->logout();
		return redirect('/bloger');
	}
	
	public function logout_any() {
		auth()->guard('web')->logout();
		return back();
	}
	public function User_create() {
		$rules = [
			'username' => 'required|max:255|unique:users',
			'First_Name' => 'required',
			'Last_Name' => 'required',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|min:6',

		];
		$data = $this->validate(request(), $rules, [], [
			'username' => trans('admin.username'),
			'First_Name' => trans('admin.First_Name'),
			'Last_Name' => trans('admin.Last_Name'),
			'email' => trans('admin.email'),
			'password' => trans('admin.password'),

		]);
		$user = new User;
		$user->username = request('username');
		$user->First_Name = request('First_Name');
		$user->Last_Name = request('Last_Name');
		$user->email = request('email');
		$user->password = bcrypt(request('password'));
		$user->save();
		//add Role
		$user->roles()->attach(Role::where('name', 'User')->first());
		// $data['password']= bcrypt(request('password'));

		// User::create($data);

		// session()->flash('success',trans('admin.added'));
		auth()->guard('web')->attempt(['email' => $data['email'], 'password' => $data['password']]);
		return redirect('/');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
