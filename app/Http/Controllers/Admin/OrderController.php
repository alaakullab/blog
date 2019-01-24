<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Order;
use Illuminate\Http\Request;
use Mail;
use Storage;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class OrderController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $Order)
    {
        if (request()->has('delivered')) {
            return $Order->render('admin.order.index', ['title' => trans('admin.order_delivered')]);
        }
        if (request()->has('pending')) {
            return $Order->render('admin.order.index', ['title' => trans('admin.order_pending')]);
        }
        if (!request()->has('delivered') and !request()->has('pending')) {
            return $Order->render('admin.order.index', ['title' => trans('admin.order')]);

        }

    }

    public function show($id)
    {
        $Order = Order::find($id);
        return view('admin.order.show', ['title' => trans('admin.show'), 'hire' => $Order]);
    }

    public function edit($id)
    {
        $Order = Order::find($id);
        if (request()->has('delivered')) {
            $Order->delivered = '0';
        } elseif (request()->has('pending')) {
//                    \config('mail.from.address.'.setting('mail'));

            Mail::to($Order->user->email)->send(new OrderShipped($Order));
            $Order->delivered = '1';
        } else {
            if ($Order->delivered == '1') {
                $Order->delivered = '0';
            } else {
                $Order->delivered = '1';
                Mail::to($Order->user->email)->send(new OrderShipped($Order));
            }
        }
        $Order->save();

//                    \config('mail.from.address.'.setting('mail'));


        return back();

    }

    public function destroy($id)
    {
        $Order = Order::find($id);
        if (!empty($Order->file)) {
            Storage::has($Order->file) ? Storage::delete($Order->file) : '';
        }

        @$Order->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $Order = Order::find($id);
                if (!empty($Order->file)) {
                    Storage::has($Order->file) ? Storage::delete($Order->file) : '';
                }
                @$Order->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $Order = Order::find($data);

            if (!empty($Order->file)) {
                Storage::has($Order->file) ? Storage::delete($Order->file) : '';
            }
            @$Order->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }

}
