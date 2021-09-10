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
        //admin/profile/createに返す
        return view('admin.profile.create');
    }
    
    
    public function create(Request $request)
    {
        
        //Profileのリクエスト全てをValidation(検証)する
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        //フォームから送信された_tokenを削除
        unset($form['_token']);
        //$formをModelにセットする
        $profile->fill($form);
        $profile->save();
        
        
        //admin/profile/createにリダイレクト
        return redirect('admin/profile/create');
    }

    
    public function index(Request $request)
    {
        //リクエスト情報内のcond_profileを$cond_profileに代入
        $cond_name = $request->cond_profile;
        //もし$cond_profileの中身が空白ではなかった場合(データがあった場合)
        if($cond_name != ''){
            //profileテーブルのnameカラムで$cond_profileと一致するレコードを取得して$postsに代入
            $posts = Profile::where('neme', $cond_name)->get();
        } else {
            //空白だった場合はprofileテーブルのレコード全てを取得して、$postsに代入する
            $posts = Profile::all();
        }
        //index.blade.phpのファイルに取得した$postsレコードと$cond_nameユーザー入力を渡す
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
        // ※index.blade.phpはresources/views/admin/profile/内に作成
    }


    public function edit(Request $request)  
    {
        //Profile Modelのデータを取得する
        $profile = Profile::find($request->id);
        //$Profileの中身がない場合は
        if(empty($profile)){
            //404へ移動
            abort(404);
        }
        return view('admin.profile.edit', 
        ['profile_form' => $profile]);
    }
    
    //resources/views/admin/profile/edit.blade.phpへ
    public function update(Request $request)
    {
        //Valodation(検証)する
        $this->validate($request, Profiles::$rules);
        //Profileモデルからデータを取得する
        $news = News::find($request->id);
        //送信されてきたフォームデータ全てを$profile_formに代入する
        $profile_form = $request->all();
        
        
        //フォームから送信されたremoveを削除
        unset($profile_form['remove']);
        //フォームから送信された_tokenを削除
        unset($profile_form['_token']);
        //該当するデータを上書き保存する
        $profile->fill($profile_form)->save;
        //admin/profile/createにリダイレクト
        return redirect('admin/profile');
    }

        //Requesutクラス(ユーザーからくる全ての情報)にdeleteメソッド
         public function delete(Request $request)
    {
        //News Modelを取得
        $profile = Profile::find($request->id);
        //削除する
        $profile->delete();
        //admin/profileへリダイレクト
        return redirect('admin/news/');
    }

}









