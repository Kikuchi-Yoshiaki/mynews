<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;  # News Profileを使う -> app/Http/Profile.php
use App\ProfileHistory;  # History Modelを使えるようにする -> app/Http/ProfileHistory
use Carbon\Carbon;  # updateActionのCarbon::now()を使う
    
    

class ProfileController extends Controller
{



    public function add() // add Action
    {
        return view('admin.profile.create'); # (resources/views/admin/news/create.blade.php)
    }
    
    
    
    public function create(Request $request) // create Action(送信されたすべて)
    {
        $this->validate($request, Profile::$rules);
            # app/Profile.php(Model)の$rules配列をValidation(検証)する
        
        $profile = new Profile; # $profileをインスタンス化(Profile)
        $form = $request->all(); # $requestの全てを受け取って$formへ
            
        unset($form['_token']); # $formのトークンをセットから外す
        
        $profile->fill($form); # $profileに上記で出された$formの値をModelにセットする
        $profile->save(); #$profileの値を保存する
        
        return redirect('admin/profile/create'); #admin/profire/createへ移動する
    }


    
    public function index(Request $request) // index Action(送信されたすべて)
    {
        $cond_profile = $request->cond_profile; # $requestの$cond_titleを$cond_titleへ代入
            # ※今回はindex,blade.phpのvalue属性なので、入力された値
            
        if($cond_profile != '') {  # $cond_profileがあれば(!='')
                $posts = Profile::where('profile', $cond_profile)->get(); # $cond_profileと一致するレコードを$postsへ
                     # Profile::where->Profileテーブル::レコード    
        } else {
            $posts = Profile::all(); # 空白だった場合はProfireテーブル全てを$postsへ代入
        }
        
        return view('admin.profile.index', ['profiles' => $posts, 'cond_profile' => $cond_profile]);
            # index.blade.phpのpostsを$posts(配列)へ、cond_profileを$sond_profileにする
    }



    public function edit(Request $request)  
    {
        $profile = Profile::find($request->id); # Profile Modelからデータを取得する
        
        if(empty($profile)){ # $newsの中身が空であれば
            abort(404); # 404 Not Foundへ
        }
        
        return view('admin.profile.edit', ['profile_form' => $profile]);
            # edit.blade.phpのprofile_formを$profileにする
    }
    
    
    
    public function update(Request $request) // update Action(送信されたすべて)
    {
        $this->validate($request, Profile::$rules);
            # app/Profile.php(Model)の$rules配列をValidation(検証)する
        
        $profile = Profile::find($request->id); # Profile Modelからデータを取得する
        $profile_form = $request->all(); # $requestの全てを受け取って$profile_formへ
        
        
        unset($profile_form['remove']); # 再読み込みされた$profile_formをセットから外す
        unset($profile_form['_token']); # $news_formのトークンをセットから外す
        
        $profile->fill($profile_form)->save; # $news_newsに上記で入力された値を$newsにセットして上書き保存
       
        
        // ※ProfileHistory Modelにも編集履歴を追加できるようにする処理
        $profile_history = new ProfileHistory(); # $profile_historyをインスタンス化(ProfileHistory)
        $profile_history->profile_id = $profile->id; # $profileのidを$profile_historyのprofile_idに代入
        $profile_history->edited_at = Carbon::now(); # 入力された現在時刻を$profile_historyのedited_atに代入
            #Carbon::now()日時操作
        $profile_history->save(); # $profile_historyを保存
        
        return redirect('admin/profile'); #admin/profileへ移動する
    }



         public function delete(Request $request)  // delete Action(送信されたすべて)
    {
        $profile = Profile::find($request->id); # Profile Modelからデータを取得する
        $profile->delete(); # $profileを削除する
        
        return redirect('admin/profile'); #admin/profileへ移動する
    }

}









