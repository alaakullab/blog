<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Files;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Form;
use Illuminate\Http\Request;
use Storage;
use Up;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $product)
    {
        if (request()->has('softdelete')) {
            return $product->render('admin.product.index', ['title' => trans('admin.product_softdelete')]);

        } else {
            return $product->render('admin.product.index', ['title' => trans('admin.product')]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', ['title' => trans('admin.create')]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(app('l') == 'en')
      {
        $rules = [
            'product_name_' . app('l') => 'required',
            'description_' . app('l') => 'required',
            'product_name_ar'=> '',
            'description_ar'=> '',
            'department_id' => 'required',
            'price' => 'required',
            'qyt' => 'required',
            'draftsmen_id' => '',
            'file.*' => 'required|' . it()->image(),

        ];
      }else{
        $rules = [
            'product_name_' . app('l') => 'required',
            'description_' . app('l') => 'required',
            'product_name_en'=> '',
            'description_en'=> '',
            'department_id' => 'required',
            'price' => 'required',
            'qyt' => 'required',
            'draftsmen_id' => '',
            'file.*' => 'required|' . it()->image(),

        ];
      }

        $data = $this->validate(request(), $rules, [], [
            'product_name_ar' => trans('admin.product_name_ar'),
            'product_name_en' => trans('admin.product_name_en'),
            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'department_id' => trans('admin.department_id'),
            'price' => trans('admin.price'),
            'qyt' => trans('admin.qyt'),
            'draftsmen_id' => trans('admin.draftsmen_name'),
            'file' => trans('admin.image_product'),
        ]);

        $user = User::where('email', admin()->user()->email)->value('id');
        $data['user_id'] = $user;
//        $data['qyt'] = 1;
        $file = request()->file('file');
        // return dd($file);
        $pr = Product::create($data);
        // return dd(it()->upload('image_product', 'product', null, $pr->id, $user, admin()->user()->id, null));
        foreach ($file as $file) {
            # code...
            // }
            // if (request()->hasFile('image_product')) {
            it()->upload($file, 'product', 'products', $pr->id, $user, admin()->user()->id, null);

            // $data['image_product'] = it()->upload('image_product', 'product');
        }
//        return dd($data);
        session()->flash('success', trans('admin.added'));
        return redirect(aurl('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', ['title' => trans('admin.show'), 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', ['title' => trans('admin.edit'), 'product' => $product]);
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
      if(app('l') == 'en')
      {
        $rules = [
            'product_name_' . app('l') => 'required',
            'description_' . app('l') => 'required',
            'product_name_ar'=> '',
            'description_ar'=> '',
            'department_id' => 'required',
            'price' => 'required',
            'qyt' => 'required',
            'draftsmen_id' => '',
            'file.*' => 'required|' . it()->image(),

        ];
      }else{
        $rules = [
            'product_name_' . app('l') => 'required',
            'description_' . app('l') => 'required',
            'product_name_en'=> '',
            'description_en'=> '',
            'department_id' => 'required',
            'price' => 'required',
            'qyt' => 'required',
            'draftsmen_id' => '',
            'file.*' => 'required|' . it()->image(),

        ];
      }
        $data = $this->validate(request(), $rules, [], [
            'product_name_ar' => trans('admin.product_name_ar'),
            'product_name_en' => trans('admin.product_name_en'),
            'description_ar' => trans('admin.description_ar'),
            'description_en' => trans('admin.description_en'),
            'department_id' => trans('admin.department_id'),
            'price' => trans('admin.price'),
            'qyt' => trans('admin.qyt'),
            'draftsmen_id' => trans('admin.draftsmen_name'),
            'image_product' => trans('admin.image_product'),
        ]);

//        $data['admin_id'] = admin()->user()->id;
        // if (request()->hasFile('image_product')) {
        // 	$data['image_product'] = it()->upload('image_product', 'product');
        // }
        // $data['file'] = '';
        $file = request()->file('image_product');
        $user = User::where('email', admin()->user()->email)->value('id');
        if (request()->hasFile('image_product')) {
            foreach ($file as $file) {
                it()->upload($file, 'product', 'products', $id, $user, admin()->user()->id, null);
            }
        }
        Product::where('id', $id)->update([

            'product_name_en' => request('product_name_en'),
            'product_name_ar' => request('product_name_ar'),
            'description_en' => request('description_en'),
            'description_ar' => request('description_ar'),
            'price' => request('price'),
            'draftsmen_id' => request('draftsmen_id'),
            'qyt' => request('qyt'),
        ]);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function recovery($id)
    {
        Product::where('id', $id)->restore();
        return back();

    }

    public function destroy($id)
    {

        $product = Product::find($id);

        if (request()->has('delete')) {


            Product::where('id', $id)->forceDelete();
            session()->flash('success', trans('admin.deleted'));
            return back();

        } else {
          $Files = Files::where('type_id', $id);
          if ($Files) {
              foreach ($Files as $file) {
                  @Storage::has($file->full_path) ? Storage::delete($file->full_path) : '';
              }
          }
            @$Product->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }

    public function product_image($id)
    {
        $Files = Files::find($id);
        @Storage::has($Files->full_path) ? Storage::delete($Files->full_path) : '';

        @Files::where('id', $id)->forceDelete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');

        if (request()->has('delete')) {

            foreach ($data as $id) {
                $product = Product::find($id);

                Product::where('id', $id)->forceDelete();
            }
            return back();
        }
        if (is_array($data)) {
            foreach ($data as $id) {
                Product::where('id', $id)->restore();

            }
            session()->flash('success', trans('admin.recovered'));
            return back();
        }
        if (is_array($data)) {
            foreach ($data as $id) {
                $product = Product::find($id);
                $Files = Files::where('type_id', $id);
                if ($Files) {
                    foreach ($Files as $file) {

                        @Storage::has($file->full_path) ? Storage::delete($file->full_path) : '';

                    }
                }

                @$product->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $product = Product::find($data);
            $Files = Files::where('type_id', $id);
            if ($Files) {
                foreach ($Files as $file) {

                    @Storage::has($file->full_path) ? Storage::delete($file->full_path) : '';

                }
            }

            @$product->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }
}
