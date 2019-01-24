<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    protected $fillable = ['total', 'delivered'];

    public function orderItems()
    {
        return $this->belongsToMany(Product::class)->withPivot('qyt', 'total');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createOrder()
    {
        $user = \Auth::user();
        $order = $user->orders()->create([
            'total' => Cart::total(),
            'delivered' =>0,
        ]);
        $cart = Cart::Content();
//        return dd($cart);
        foreach ($cart as $cartItem) {
            $order->orderItems()->attach($cartItem->id, [
                'qty' => $cartItem->qty,
                'total' => $cartItem->qty * $cartItem->price,
            ]);
        }
    }
}
