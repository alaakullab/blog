<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Up;
use Storage;
class SettingController extends Controller
{
	public function show(){
		// updateLanguage(1,'setting',2,'site_name','Ecomerce');
		$title = trans('admin.setting');
		$setting = Setting::find(1);
		return view('admin.setting.index',['title'=>$title,'setting'=>$setting]);
	}
	public function icon(){
		$data = [
			'icon'=>'',
		];
	 Storage::has(setting()->icon)?Storage::delete(setting()->icon):'';
		$setting = Setting::where('id',1)->update($data);
		// $setting->icon = ' asd';
		// $setting->seve();

		return back();
	}
	public function logo(){
			$data = [
			'logo'=>'',
		];
	 Storage::has(setting()->icon)?Storage::delete(setting()->icon):'';
		$setting = Setting::where('id',1)->update($data);
		return back();
	}
	public function situpdate(){
	
	
			$data = $this->validate(request(),[
			'site_name_ar'=>'required',
			'site_name_en'=>'required',
			'site_desc_en'=>'required',
			'site_desc_ar'=>'required',
			'mail'=>'required',
			'phone'=>'required',
			'copyright'=>'required',
			'facebook'=>'sometimes|nullable',
			'instagram'=>'sometimes|nullable',
			'twitter'=>'sometimes|nullable',
			'icon'=>'sometimes|nullable|'.it()->image(),
			'logo'=>'sometimes|nullable|'.it()->image(),
			'Maintenance_message'=>'sometimes|nullable',
			'keyword'=>'sometimes|nullable',
		],[],[
			'site_name_en'=>trans('admin.site_name'),
			'site_name_ar'=>trans('admin.site_name'),
			'site_desc_en'=>trans('admin.site_desc_en'),
			'site_desc_ar'=>trans('admin.site_desc_ar'),
			'mail'=>trans('admin.mail'),
			'phone'=>trans('admin.phone'),
			'copyright'=>trans('admin.copyright'),
			'maintenance'=>trans('admin.maintenance'),
			'facebook'=>trans('admin.facebook'),
			'instagram'=>trans('admin.instagram'),
			'twitter'=>trans('admin.twitter'),
			'icon'=>trans('admin.icon'),
			'logo'=>trans('admin.logo'),
			'keyword'=>trans('admin.keyword'),
			'Maintenance_message'=>trans('admin.Maintenance_message')
		]);
			if(request('maintenance')){
				$data['maintenance']='open';
			}else{
			$data['maintenance']='close';

			}
			  if(request()->hasFile('icon')){
                Storage::has(setting()->icon)?Storage::delete(setting()->icon):'';
                $data['icon'] = it()->upload('icon','setting');

            } 
             if(request()->hasFile('logo')){
             	Storage::has(setting()->logo)?Storage::delete(setting()->logo):'';
                $data['logo'] = it()->upload('logo','setting');
            }
		Setting::where('id',1)->update($data);
		toastr()->success(trans('admin.Success'),trans('admin.updated'));

		return back();
		
		
	}

	}
