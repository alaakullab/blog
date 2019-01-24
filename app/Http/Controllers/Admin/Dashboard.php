<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class Dashboard extends Controller {

	public function home() {
		$comment = \App\Comment::count();
		$user = \App\User::count();
		$ordersum = \App\Order::sum('total');
		$order = \App\Order::count();
		$product = \App\Product::count();
		$Visitor = \App\Visitor::paginate(10);
		return view('admin.home', ['title' => trans('admin.dashboard'),'comment'=>$comment,'user'=>$user
		,'ordersum'=>$ordersum,'product'=>$product,'order'=>$order,'Visitor'=>$Visitor]);
	}

	public function theme($id) {
		if (session()->has('theme')) {
			session()   ->forget('theme');
		}
		session()->put('theme', $id);
	}
}
