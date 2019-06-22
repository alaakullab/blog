<?php

namespace App\Http\Controllers\thame\shop;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::content();
        return view('shop.pages.cart', ['cartItems' => $cartItems, 'title' => trans('admin.Shopping_cart')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($productId)
    {
        $product = Product::find($productId);
//        Cart::add(['id' => $productId, 'name' =>$product->product_name_en, 'qty' => 1, 'price' => $product->price]);
        Cart::add($productId, $product->product_name_en, 1, $product->price);
        return back();
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
        $rowId = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

        Cart::update($id, request('qty'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *checkout1
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function payment_method()
    {
        return view('shop.pages.chechout2');
    }

    public function payment_method_post()
    {
        if (request()->has('payment') == 'Payment') {
            $key = 'Payment';
            return redirect('/E-commerce/Order/Payment');
        }
        if (request()->has('Paypal') == 'Paypal') {
            $key = 'Paypal';
            return redirect('/E-commerce/Order/Paypal');
        }
    }

    public function Order($key)
    {
        $cartItems = Cart::content();
        return view('shop.pages.chechout3', ['cartItems' => $cartItems, 'key' => $key]);

    }

    public function Order_post($key)
    {
        if ($key == 'Payment') {
            return redirect('/E-commerce/payment');
        }
        if ($key == 'Paypal') {
            return redirect('/E-commerce/Paypal');
        }
//        $cartItems = Cart::content();
        //        return view('shop.pages.chechout3', ['cartItems' => $cartItems,'key'=>$key]);

    }

    public function payment_show()
    {
        //   $key = env('STRIPE_KEY','pk_test_oKwtlDplNFGm3to5KKMizvSH');
             $key = 'pk_test_vTp0AXwixTZmU9kimxAUZ1Gj';
        return view('shop.pages.payment',['key'=>$key,'title'=>awTtrans('Payment Gateway','ar')]);

    }

    public function payment_post()
    {
// Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        $key = 'sk_test_scJee8A9DHP0E8R5EBUqdNis';
        \Stripe\Stripe::setApiKey($key);
        $c = Cart::total();
        $cartt = str_replace('.', '', $c);
// Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $cartt,
            'currency' => 'usd',
            'source' => $token,
            'description' => 'Example charge',
        ]);
        // crate the order
        Order::createOrder();
//		dd('ok');
        return redirect('/E-commerce/done');
    }

    public function delete_cart($id)
    {
        Cart::remove($id);
        return back();
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }
}
