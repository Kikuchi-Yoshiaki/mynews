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
    
    //resources/views/admin/profile/create.blade.phpへ
    public function create(Request $request)
    {
        
        //Varidationを使う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        //フォームから送信された_tokenを削除
        unset($form['_token']);
        
        
        //admin/profile/createにリダイレクト
        return redirect('admin/profile/create');
    }

    //resources/views/admin/profile/edit.blade.phpへ
    public function edit() 
    {
        return view('admin.profile.edit');
    }
    
    //resources/views/admin/profile/edit.blade.phpへ
    public function update()
    {
        return redirect('admin/profile/edit');
    }

}
