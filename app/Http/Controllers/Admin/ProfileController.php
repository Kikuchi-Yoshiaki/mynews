<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Profile Modelを使えるようにする
use App\Profile;

class ProfileController extends Controller
{

    //resources/views/admin/profile/create.blade.phpへ
    public function add()
    {
        return view('admin.profile.create');
    }
    
    
    public function create(Request $request)
    {
        
        //Varidationを使う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
 
        
        //フォームから送信された_tokenを削除
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        
        //admin/profile/createにリダイレクト
        return redirect('admin/profile/create');
    }

    
    public function index(Request $request)
    {
        $cond_profile = $request->cond_profile;
        if($cond_profile != ''){
            $posts = Profile::where('neme', $cond_name)->get();
        } else {
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }


    public function edit(Request $request)  
    {
        
        $profile = Profile::find($request->id);
        if(empty($profile)){
            abort(404);
        }
        return view('admin.profile.edit', 
        ['profile_form' => $profile]);
    }
    
    //resources/views/admin/profile/edit.blade.phpへ
    public function update()
    {
        $this->validate($request, Profiles::$rules);
        $profile_form = $request->all();
        
        unset($profile_form['remove']);
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save;
        
        return redirect('admin/profile');
    }

}









