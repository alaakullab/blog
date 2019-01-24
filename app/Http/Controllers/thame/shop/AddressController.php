<?php

namespace App\Http\Controllers\thame\shop;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return dd('asd');
        $Address = Address::where('user_id',Auth::user()->id)->first();
        return view('shop.pages.checkout1',['address'=>$Address]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_address($id)
    {
        $data = $this->validate(request(), [
            'addressesline' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required|integer',
            'country' => 'required',
            'phone' => 'required|integer',
        ]);
        // return dd(Auth::user()->id);
        Address::where('user_id',Auth::user()->id)->update($data);
            return redirect('E-commerce/payment-method');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'addressesline' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required|integer',
            'country' => 'required',
            'phone' => 'required|integer',
        ]);
//        Auth::user()->a
        $data['user_id']=Auth::user()->id;
        Address::create($data);
            return redirect('E-commerce/payment-method');
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
