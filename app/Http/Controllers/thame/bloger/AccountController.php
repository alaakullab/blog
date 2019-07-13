<?php

namespace App\Http\Controllers\thame\bloger;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Informations_users;
use App\Experience;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {


        return view('blog.pages.my-account.account', ['title' => trans('admin.account')]);
    }

    public function social_media()
    {
        $user = Informations_users::where('user_id', \Auth::user()->id)->first();
        return view('blog.pages.my-account.social-media', ['title' => awTtrans('social media', 'en'), 'user' => $user]);
    }

    public function social_media_post()
    {
        $rules = [

            'linkedin' => ' ',
            'instagram' => ' ',
            'facebook' => ' ',
            'twitter' => ' ',
            'pinterest' => ' ',

        ];
        $data = $this->validate(request(), $rules, [], [
            'linkedin' => trans('admin.linkedin'),
            'instagram' => trans('admin.instagram'),
            'facebook' => trans('admin.facebook'),
            'twitter' => trans('admin.twitter'),
            'pinterest' => trans('admin.pinterest'),


        ]);
        Informations_users::where('user_id', \Auth::user()->id)->update($data);
        toastr()->success(trans('admin.Success'), trans('admin.updated'));
        return back();
    }

    public function Change_password()
    {
        $hash = \Hash::check(request('Oldpassword'), \Auth::user()->password);
        $user = User::find(\Auth::user()->id);
        // return dd($hash);
        // $hashmake = $this->hasher->check(request('Oldpassword'));
        // return dd($hash);
        // $hashmake = bcrypt(request('Oldpassword'));
        // $hashmake = \Hash::make(request('Oldpassword'));
        if ($hash) {
            $rules = [
                'password' => 'required|min:6',
                'Retype_new_password' => 'required_with:password|same:password|min:6',

            ];
            $data = $this->validate(request(), $rules, [], [
                'Oldpassword' => trans('admin.Oldpassword'),
                'password' => trans('admin.New_password'),
                'Retype_new_password' => trans('admin.Retype_new_password'),

            ]);
            $user->update(['password' => bcrypt(request('password'))]);
            toastr()->success(trans('admin.Success'), trans('admin.updated'));

            return redirect('E-commerce/account')
                ->with('notificationText', trans('admin.User_Password_Changed_Successfully!'));
        } else {
            // $rules = [
            // 	'password' => 'required|min:6',
            // 	'Retype_new_password' => 'required_with:password|same:password|min:6',

            // ];
            // $data = $this->validate(request(), $rules, [], [
            // 	'password' => trans('admin.New_password'),
            // 	'Retype_new_password' => trans('admin.Retype_new_password'),

            // ]);
            return redirect()->back()->withErrors(['current_password' => trans('admin.Your_Current_Password_Wrong!')]);
        }
        // $rules = [
        // 	'Oldpassword' => 'required',
        // 	// 'Oldpassword' => 'required|Oldpassword:users,password,' . Auth::user()->password,
        // 	'password' => 'required|min:6',
        // 	'Retype_new_password' => 'required_with:password|same:password|min:6',

        // ];
        // $data = $this->validate(request(), $rules, [], [
        // 	'Oldpassword' => trans('admin.Oldpassword'),
        // 	'password' => trans('admin.New_password'),
        // 	'Retype_new_password' => trans('admin.Retype_new_password'),

        // ]);
        // $validator = $data['Oldpassword'];
        // $validator->after(function ($hash) {
        // 	if ($this->somethingElseIsInvalid()) {
        // 		$validator->errors()->add('field', 'Something is wrong with this field!');
        // 	}
        // });
        // $value = $data['Oldpassword'];
        // Validator::extend('Oldpassword', function ($attribute, $value, $parameters) {
        // 	return Hash::check($value, Auth::user()->password);
        // });
        // \Hash::check(request('Oldpassword'), Auth::user()->password),

    }

    public function exp()
    {
        $exp = Experience::where('user_id', \Auth::user()->id)->get();
        return view('blog.pages.my-account.experiences', ['exp' => $exp, 'title' => trans('admin.exp')]);

    }

    public function exp_id($id)
    {
        @Experience::where('id', $id)->delete();
        toastr()->success(trans('admin.Success'), trans('admin.deleted'));
        return back();

    }

    public function exp_post()
    {
        $rules = [

            'exp' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            'exp' => trans('admin.exp'),


        ]);
        $data['user_id'] = \Auth::user()->id;
        Experience::create($data);
        toastr()->success(trans('admin.Success'), trans('admin.added'));

        return back();

    }

    public function Account_information()
    {
        $user = User::find(\Auth::user()->id);
        $Informations_users_de = Informations_users::where('user_id', \Auth::user()->id)->first();
        return view('blog.pages.my-account.account-information', ['title' => trans('admin.Account_information'), 'user' => $user, 'Informations_users_de' => $Informations_users_de]);
    }

    public function Account_information_post()
    {
        $rules = [
            'First_name' => 'required',
            'Last_name' => 'required',
        ];

        $data = $this->validate(request(), $rules, [], [
            'Last_name' => trans('admin.Lastname'),
            'First_name' => trans('admin.Firstname')
        ]);

        $rules_Informations_users = [
            'Gender' => '',
            'Phone' => '',
        ];

        $data_Informations_users = $this->validate(request(), $rules_Informations_users, [], [
            'Gender' => trans('admin.Gender'),
            'Phone' => trans('admin.Phone')
        ]);

        $user = User::where('id', \Auth::user()->id);
        $user->First_name = request('First_name');
        $user->Last_name = request('Last_name');
        User::where('id', \Auth::user()->id)->update($data);

        $Informations_users_de = Informations_users::where('user_id', \Auth::user()->id)->first();
        if (isset($Informations_users_de)) {
            Informations_users::where('user_id', \Auth::user()->id)->update($data_Informations_users);
        }else{
            $de = new Informations_users;
            $de->Gender = request('Gender');
            $de->Phone = request('Phone');
            $de->user_id = \Auth::user()->id;
            $de->save();
        }
        toastr()->success(trans('admin.Success'), trans('admin.updated'));

        return back();
    }

    public function Change_profile()
    {
        // return dd(\App\User::where('id', \Auth::user()->id)->get());

        return view('blog.pages.my-account.change-profile', ['title' => trans('admin.Change_profile')]);
    }

    public function Change_profile_post()
    {
        $rules = [

            'user_image' => 'required|' . it()->image(),

        ];
        $data = $this->validate(request(), $rules, [], [
            'user_image' => trans('admin.user_image'),

        ]);
        if (request()->hasFile('user_image')) {
            $data['user_image'] = it()->upload('user_image', 'user');
        }
        // return dd($data['user_image']);
        User::where('id', \Auth::user()->id)->update($data);
        toastr()->success(trans('admin.Success'), trans('admin.updated'));

        return back();
    }
}
