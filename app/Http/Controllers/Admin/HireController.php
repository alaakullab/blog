<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HireDataTable;
use App\Hire;
use App\Http\Controllers\Controller;
use Form;
use Illuminate\Http\Request;
use Set;
use Storage;
use Up;
use Validator;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class HireController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(HireDataTable $Hire)
    {
        return $Hire->render('admin.hire.index', ['title' => trans('admin.hire')]);
    }


    public function show($id)
    {
        $Hire = Hire::find($id);
        return view('admin.hire.show', ['title' => trans('admin.show'), 'hire' => $Hire]);
    }


    public function destroy($id)
    {
        $Hire = Hire::find($id);
        if (!empty($Hire->file)) {
            Storage::has($Hire->file) ? Storage::delete($Hire->file) : '';
        }

        @$Hire->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $Hire = Hire::find($id);
                if (!empty($Hire->file)) {
                    Storage::has($Hire->file) ? Storage::delete($Hire->file) : '';
                }
                @$Hire->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $Hire = Hire::find($data);

            if (!empty($Hire->file)) {
                Storage::has($Hire->file) ? Storage::delete($Hire->file) : '';
            }
            @$Hire->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }


}
