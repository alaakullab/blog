<?php

namespace App\Http\Controllers\thame\home;

use App\Http\Controllers\Controller;
use App\User;
use App\Informations_users;
use Form;
use Illuminate\Http\Request;
use Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logout()
    {
        $status = auth()->guard('web')->logout();
        if ($status == null)
        {
            toastr()->success(trans('success'), trans('admin.Logout_successful'));
        }
        else
        {
            toastr()->error(trans('error'), trans('admin.Error_logout'));
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account_index()
    {
        $user = User::find(\Auth::user()->id);
        return view('blog.pages.my-account.home', ['user' => $user]);
    }

    public function account_edit()
    {
        $user = User::find(\Auth::user()->id);
        return view('blog.pages.my-account.edit', ['user' => $user]);
    }

    public function account_store()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            'first_name' => trans('admin.first_name'),
            'last_name' => trans('admin.last_name'),
            'phone' => trans('admin.phone'),
            'email' => trans('admin.email'),

        ]);
        $user = User::where('id', \Auth::user()->id);
        $user->First_name =request('First_name');
        $user->Last_name =request('Last_name');
        if( Informations_users::where('user_id', \Auth::user()->id)){
          $de = Informations_users::where('user_id', \Auth::user()->id);
          $de->Gender = request('Gender');
          $de->Phone = request('Phone');
          $de->save();
        }
        toastr()->success(trans('admin.Success'), trans('admin.updated'));
        return back();
    }

    public function account_upload()
    {
        $user = User::find(\Auth::user()->id);
        return view('blog.pages.my-account.upload-image', ['user' => $user]);
    }

    public function account_upload_post()
    {
        if (request()->hasFile('user_image')) {
            Storage::has(\Auth::user()->user_image) ? Storage::delete(\Auth::user()->user_image) : '';
            $user_image = it()->upload('user_image', 'user');

        }
        // return dd(request()->hasFile('user_image'));
        User::where('id', \Auth::user()->id)->update(['user_image' => $user_image]);
        toastr()->success(trans('admin.Success'), trans('admin.updated'));

        return back();
    }

    public function change_password()
    {
        $user = User::find(\Auth::user()->id);

        return view('blog.pages.my-account.change-password', ['user' => $user]);
    }

    public function change_password_post(Request $request)
    {
        $user = \Auth::user();
        // return dd(\Hash::make($request->get('current_password')));
        // return dd(\Hash::check($request->current_password, $user->password));

        if (\Hash::check($request->get('current_password'), $user->password)) {
            $user->update(['password' => bcrypt($request->get('password'))]);
            return redirect('my-account/home')
                ->with('notificationText', trans('admin.User_Password_Changed_Successfully!'));
        } else {
            return redirect()->back()->withErrors(['current_password' => trans('admin.Your_Current_Password_Wrong!')]);
        }
    }
}
