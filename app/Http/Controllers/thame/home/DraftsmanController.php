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
        $Post_draftsman =  Post_draftsman::where('user_id',$user->id)->get();

        $skills =  Skill::where('user_id',$user->id)->get();

//        $Post_draftsman = Post_draftsman::paginate(1);
//         return dd(\App\Files::where('type_file','post_draftsmans')->where('type_id','1')->where('user_id','2')->get());
//        view('draftsman.layouts.app',['user' => $user,'Post_draftsman'=>$Post_draftsman,'username'=>$username]);

//        return dd($user);
        return view('home.pages.draftsman.index', ['HomeLogin'=>$HomeLogin,'title' => trans('home.draftsman_index'),'user' => $user, 'Post_draftsman' => $Post_draftsman,'skills' => $skills, 'username' => $username]);
    }


    public function draftsman_all_index(Request $request)
    {
        if ($request->search == "") {
            $users = User::orderBy("id", "DESC")->paginate(9);
            return view('home.pages.draftsman.alldraftsmanlist', ['title' => trans('admin.draftsman'),'users' => $users]);
        } else {
            $users = User::where('username', 'LIKE', '%' . $request->search . '%')
                ->orWhere('First_Name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('Last_Name', 'LIKE', '%' . $request->search . '%')
                ->orderBy("id", "DESC")
                ->paginate(9);
            return view('home.pages.draftsman.alldraftsmanlist', ['title' => trans('admin.draftsman'),'users' => $users]);
        }
    }

    public function app($username)
    {
        $user = User::where('username', $username)->first();
        $Post_draftsman = Post_draftsman::get();
//        $Post_draftsman = Post_draftsman::paginate(1);

//         return dd(\App\Files::where('type_file','post_draftsmans')->where('type_id','1')->where('user_id','2')->get());
        return view('home.pages.draftsman.index', ['title' => trans('home.draftsman_app'),'user' => $user, 'Post_draftsman' => $Post_draftsman]);
    }

    public function create($username)
    {
        // return dd($user->Informations_draftsmans->Full_Name);
        $user = User::where('username', $username)->first();

        return view('home.pages.draftsman.pages.create', ['title' => trans('admin.add_action'), 'username' => $username, 'user' => $user]);
    }
    public function about()
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

        // return dd($user->Informations_draftsmans->Full_Name);
        $user = User::where('username', \Auth::user()->username)->first();
        $user->Informations_users_de->update($data);
        $data['success'] = trans('admin.updated');
        return response()->json($data);
//        return back();
    }


    public function store()
    {
        $rules = [
            'title' => 'required',
            'file.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'. it()->image(),
        ];
        $data = $this->validate(request(), $rules, [], [
            'title' => trans('admin.title'),
            'file' => trans('admin.images_action'),
        ]);
//                return dd(admin()->user()->id);
        $user = \Auth::user()->id;
        $data['user_id'] = $user;
        $file = request()->file('file');
        $pr = Post_draftsman::create($data);

        foreach ($file as $file) {
            it()->upload($file, 'post_draftsman', 'post_draftsmans', $pr->id, $user,null, null);
        }

        session()->flash('success', trans('admin.added'));

//        return response()->json(['success'=>'done']);

//        return response()->json($data);

        return redirect('draftsman/' . \Auth::user()->username . '/index');
        // return dd($user->Informations_draftsmans->Full_Name);
//        return view('draftsman.pages.create', ['title' => trans('admin.add_action')]);
    }

    public function skills_store()
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
        session()->flash('success', trans('admin.added'));

        return response()->json($data);

//        return redirect('draftsman/' . \Auth::user()->username . '/index');

    }


    public function destroy_my_skill()
    {
        $id = request('id');
        $skill = Skill::find($id);
        @$skill->delete();
//        session()->flash('success', trans('admin.deleted'));
        $data['id'] = $id;
        $data['success'] =  trans('admin.deleted');

        return response()->json($data);
//        return back();
    }

    public function destroy_myportfoliofile()
    {
        $id = request('fileid');
        $myportfolioFiles = Files::find($id);
//        $myportfolio = $myportfolioFiles->file;
//        $myportfolioid = $myportfolio->id::find('21');

//        return dd($myportfolioFiles);
        if (!empty($myportfolioFiles)) {
            Storage::has($myportfolioFiles) ? Storage::delete($myportfolioFiles) : '';
        }

        $myportfolioFiles->delete();
        $data['id'] = $id;
        $data['success'] =  trans('admin.deleted');


        return response()->json($data);
//        return back();
    }


    public function multi_delete(Request $r)
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
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $Contact = Contact::find($data);

            if (!empty($Contact->file)) {
                Storage::has($Contact->file) ? Storage::delete($Contact->file) : '';
            }
            @$Contact->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }
}
