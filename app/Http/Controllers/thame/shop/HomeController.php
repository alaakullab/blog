<?php

namespace App\Http\Controllers\thame\shop;

use App\Department;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Slider;
use App\Role;
use App\User;
use App\Wishlist;
use App\New_news;
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
    public function index()
    {
//		$tag = Tag::where('name_en', $name)->value('id');
        // return dd($file = \App\Files::where('type_id', 15)->first());
        $Product = Product::get();
        $Slider = Slider::where('type_file','Ecommerce')->get();
        $depar = Department::where('parent_id',null)->latest()->limit(3)->get();
        return view('shop.pages.index', ['title' => trans('admin.store'),'depar'=>$depar,'slider'=>$Slider, 'product' => $Product]);
    }
   public function done()
    {

        return view('shop.pages.done', ['title' => awtTrans('The payment was made','ar')]);
    }
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
    public function filter($name)
    {
      $dep = Department::get();
      $tag = Department::where('dep_name_en', $name)->value('id');

        // return dd(request('prices') );
if( request('prices') == "25")
{
  $product = Product::where('department_id', $tag)->where('price' ,'>=', 25)->where('price' ,'<=', 50)->orderBy('id', 'desc')->paginate(6);
}
if( request('prices') == "50")
{
  $product = Product::where('department_id', $tag)->where('price' ,'>=', 50)->where('price' ,'<=', 100)->orderBy('id', 'desc')->paginate(6);
  // return dd($product);

}
if( request('prices') == "100")
{
  $product = Product::where('department_id', $tag)->where('price' ,'>=', 100)->where('price' ,'<=', 200)->orderBy('id', 'desc')->paginate(6);

}
if( request('prices') == "100000")
{
  $product = Product::where('department_id', $tag)->orderBy('id', 'desc')->paginate(6);

}
if(request('orderBy') == 'High')
{
  $product = Product::where('department_id', $tag)->orderBy('price', 'desc')->paginate(6);

}
if(request('orderBy') == 'Low')
{
  $product = Product::where('department_id', $tag)->orderBy('price', 'asc')->paginate(6);

}
      return view('shop.pages.category', ['title' => trans('home.post'), 'products' => $product, 'dep' => $dep]);

    }
    public function login_post()
    {
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
            toastr()->error(trans('admin.login_failed'));
            return back();
        }
        toastr()->success(trans('admin.Success'),trans('admin.Login_successful'));
        return back();

    }

    public function login_ecommerce()
    {

        $rememberme = true;
//        if (!auth()->guard('web')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
        //            return back()->withErrors([
        //                'massage' => 'Email or password not correct !!',
        //            ]);
        //        }
        if (auth()->guard('web')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect('E-commerce');
        } else {
            toastr()->error(trans('admin.Error'),trans('admin.error_loggedin'));
            return redirect('E-commerce/register');
        }

    }

    public function login_ecommerce_checkout()
    {

        $rememberme = true;
//        if (!auth()->guard('web')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
        //            return back()->withErrors([
        //                'massage' => 'Email or password not correct !!',
        //            ]);
        //        }
        if (auth()->guard('web')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return back();
        } else {
            toastr()->error(trans('admin.Error'), trans('admin.error_loggedin'));
            return back();
        }

    }

    public function logout()
    {
        $status = auth()->guard('web')->logout();
        if ($status == null)
        {
            toastr()->success(trans('admin.Success'), trans('admin.Logout_successful'));
        }
        else
        {
            toastr()->error(trans('admin.Error'), trans('admin.Error_logout'));
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * update a newly created resource in storage.
     * @param  \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function single_product($id)
    {
        $dep = Department::get();
        $product = Product::find($id);
        $product_get = Product::limit(3)->get();
        
        if(app('l')=='en')
        {
            $title = $product->product_name_en;
        }else{
            $title = $product->product_name_ar;

        }
        return view('shop.pages.single_product', ['title'=>$title,'product' => $product, 'product_get' => $product_get, 'dep' => $dep]);
    }

    public function category($name)
    {
        $dep = Department::get();
        $tag = Department::where('dep_name_en', $name)->value('id');
                $parent = Department::where('dep_name_en', $name)->value('parent_id');

//        return dd(\App\Department::where('parent_id','1')->get());
        $product = Product::where('department_id', $tag)->orderBy('id', 'desc')->paginate(6);
        return view('shop.pages.category', ['title' => trans('admin.post'),'tag'=>$parent ,'products' => $product, 'dep' => $dep]);
    }

    public function search()
    {
        $rules = [
            'search' => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'search' => trans('admin.search'),
        ]);
        $dep = Department::get();
        if (app('l') == 'en') {
            $product = Product::where('product_name_en','like' ,request('search').'%')->orderBy('id', 'desc')->paginate(6);

        } else {
            $product = Product::where('product_name_ar', 'like',request('search').'%')->orderBy('id', 'desc')->paginate(6);

        }
        return view('shop.pages.search', ['title' => trans('admin.search_page'), 'products' => $product, 'dep' => $dep]);
    }

    public function contact()
    {
        return view('shop.pages.contact', ['title' => trans('admin.contact')]);
    }

    public function Register()
    {
        return view('shop.pages.register',['title'=>awTtrans('register','ar')]);
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

        // toastr()->success(trans('admin.Success'),trans('admin.added'));
        auth()->guard('web')->login($user);
        // auth()->guard('web')->attempt(['email' =>$data['email'], 'password' => $data['password']]);
        return redirect('E-commerce');
    }

    public function register_checkout()
    {
        $rules = [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
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

        // toastr()->success(trans('admin.Success'),trans('admin.added'));
        auth()->guard('web')->login($user);
        // auth()->guard('web')->attempt(['email' =>$data['email'], 'password' => $data['password']]);
        return back();
    }

    public function wishlist($id)
    {
        $wishlist = new wishlist;
        $wishlist->user_id = \Auth::user()->id;
        $wishlist->product_id = $id;
        $wishlist->save();
        toastr()->success(trans('admin.Success'), trans('admin.Add_to_wishlist'));
        return back();
    }

    public function wishlist_show()
    {
        $wishlist = Wishlist::where('user_id', \Auth::user()->id)->get();
        // return dd($wishlist);
        return view('shop.pages.wishlist', ['title' => trans('admin.wishlist'), 'wishlist' => $wishlist]);
        return back();
    }

    public function wishlist_delete($id)
    {
        $wishlist = Wishlist::find($id);

        @$wishlist->delete();

        return back();
    }

    public function orders_show()
    {
        $orders = Order::where('user_id', \Auth::user()->id)->get();
        // return dd($wishlist);
        return view('shop.pages.orders', ['title' => trans('admin.order'), 'orders' => $orders]);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
