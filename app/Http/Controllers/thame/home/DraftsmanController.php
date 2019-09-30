<?php

namespace App\Http\Controllers\thame\home;

use App\Http\Controllers\Controller;
use App\User;
use App\Post_draftsman;
use App\Files;
use App\HomeLogin;
use App\Skill;
use Form;
use App\Role;
use Illuminate\Http\Request;
use Storage;
use Up;


class DraftsmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($username)
    {
        $HomeLogin = HomeLogin::find(1);

        $user = User::where('username', $username)->first();
        $Post_draftsman = Post_draftsman::where('user_id', $user->id)->get();
        $skills = Skill::where('user_id', $user->id)->get();
        return view('home.pages.draftsman.index', ['HomeLogin' => $HomeLogin, 'title' => trans('home.draftsman_index'), 'user' => $user, 'Post_draftsman' => $Post_draftsman, 'skills' => $skills, 'username' => $username]);
    }


    public function draftsman_all_index(Request $request)  /* عرض الرسامين في الصفاحة الخاصة بجميع الرسامين  */
    {
        if ($request->search == "") {
            $users = User::orderBy("id", "DESC")->paginate(9);
            return view('home.pages.draftsman.alldraftsmanlist', ['title' => trans('admin.draftsman'), 'users' => $users]);
        } else {
            $users = User::where('username', 'LIKE', '%' . $request->search . '%')
                ->orWhere('First_Name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('Last_Name', 'LIKE', '%' . $request->search . '%')
                ->orderBy("id", "DESC")
                ->paginate(9);
            return view('home.pages.draftsman.alldraftsmanlist', ['title' => trans('admin.draftsman'), 'users' => $users]);
        }
    }

    public function app($username)
    {
        $user = User::where('username', $username)->first();
        $Post_draftsman = Post_draftsman::get();
//        $Post_draftsman = Post_draftsman::paginate(1);
        return view('home.pages.draftsman.index', ['title' => trans('home.draftsman_app'), 'user' => $user, 'Post_draftsman' => $Post_draftsman]);
    }

    public function create($username)
    {
        $user = User::where('username', $username)->first();

        return view('home.pages.draftsman.pages.create', ['title' => trans('admin.add_action'), 'username' => $username, 'user' => $user]);
    }

    public function about() /*  معلومات المتسخدم الاساسية أو معلومات الرسام */
    {
        $rules = [
            'Address' => '',
            'Gender' => 'required',
            'Phone' => '',
            'about_me' => '',
        ];
        $data = $this->validate(request(), $rules, [], [
            'Address' => awtTrans('admin.Address'),
            'Gender' => trans('admin.Gender'),
            'Phone' => trans('admin.Phone'),
            'about_me' => trans('admin.about_me'),
        ]);

        $user = User::where('username', \Auth::user()->username)->first();
        $user->Informations_users_de->update($data);
        $data['success'] = trans('admin.updated');
        return response()->json($data);
    }


    public function store()  /*  اضافة إلى معرض أعمال الرسام  */
    {
        $rules = [
            'title' => 'required',
            'file.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' . it()->image(),
        ];
        $data = $this->validate(request(), $rules, [], [
            'title' => trans('admin.title'),
            'file' => trans('admin.images_action'),
        ]);
        $user = \Auth::user()->id;
        if (!empty($file)) {

            $data['user_id'] = $user;
            $file = request()->file('file');

            $pr = Post_draftsman::create($data);

            foreach ($file as $file) {
                it()->upload($file, 'post_draftsman', 'post_draftsmans', $pr->id, $user, null, null);
            }

            toastr()->success(trans('admin.Success'), trans('admin.added'));
        } else {
            toastr()->error(trans('admin.Error'), trans('admin.added'));
        }

        return redirect('draftsman/' . \Auth::user()->username . '/index');
    }

    public function skills_store() /*  اضاقة مهارات للرسام */
    {
        $rules = [
            'name' => 'required',
            'level' => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'name' => trans('admin.title'),
            'level' => trans('admin.title'),
        ]);
        $user = \Auth::user()->id;
        $data['user_id'] = $user;
        $last = Skill::create($data);
        $data['last_id'] = $last->id;
        $data['success'] = trans('admin.added');

//        session()->flash('success', trans('admin.added'));

        return response()->json($data);
    }


    public function destroy_my_skill()  /*  حذف  مهارات الرسام  */
    {
        $id = request('id');
        $skill = Skill::find($id);
        @$skill->delete();
        $data['id'] = $id;
        $data['success'] = trans('admin.deleted');
//        toastr()->success(trans('admin.Success'), trans('admin.deleted'));
        return response()->json($data);
//        return back();
    }

    public function destroy_myportfoliofile()  /* حذف معرض الأعمال  */
    {
        $id = request('fileid');
        $myportfolioFiles = Files::find($id);
//        $myportfolio = $myportfolioFiles->file;
//        $myportfolioid = $myportfolio->id::find('21');

        if (!empty($myportfolioFiles)) {
            Storage::has($myportfolioFiles) ? Storage::delete($myportfolioFiles) : '';
        }
        $myportfolioFiles->delete();
        $data['id'] = $id;
        $data['success'] = trans('admin.deleted');

        return response()->json($data);
    }


    public function multi_delete(Request $r)  /* حذف أكثر من Row  */
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $Contact = Contact::find($id);
                if (!empty($Contact->file)) {
                    Storage::has($Contact->file) ? Storage::delete($Contact->file) : '';
                }
                @$Contact->delete();
            }
            toastr()->success(trans('admin.Success'), trans('admin.deleted'));
            return back();
        } else {
            $Contact = Contact::find($data);

            if (!empty($Contact->file)) {
                Storage::has($Contact->file) ? Storage::delete($Contact->file) : '';
            }
            @$Contact->delete();
            toastr()->success(trans('admin.Success'), trans('admin.deleted'));
            return back();
        }
    }
}
