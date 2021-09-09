<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//News Modelを使えるようにする
use App\News;

class NewsController extends Controller
{
    //resources/views/admin/news/create.blade.phpへ
    public function add()
    {
        //admin/news/createに返す
        return view('admin.news.create');
    }

//カリキュラム22の追加部分
    //resources/views/admin/news/create.blade.phpへ
    public function create(Request $request)
    {
        
        //Varidationを行う
        $this->validate($request, News::$rules);
        
        $news = new News;
        $form = $request->all();
        
        //フォームから画像が来たら保存して$news->image_pathに画像を保存
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        //画像が来なかったらNullで返す    
        } else {
            $news->image_path = null;
        }
        
        //フォームから送信された_tokenを削除
        unset($form['_token']);
        //フォームから送信されたをimage削除
        unset($form['image']);
        //
        $news->fill($form);
        $news->save();
        
        
        //admin/news/createにリダイレクト
        return redirect('admin/news/create');
    }


    //Requesutクラス(ユーザーからくる全ての情報)にindexメソッド
    public function index(Request $request)
    {
        //リクエスト情報内のcond_titleを$cond_titleに代入
        $cond_title = $request->cond_title;
        //もし$cond_titleの中身が空白ではなかった場合(データがあった場合)
        if ($cond_title != '') {
            //newsテーブルのtitleカラムで$cond_titleと一致するレコードを取得して$postsに代入
            $posts = News::where('title', $cond_title)->get();
        } else {
            //空白だった場合はnewsテーブルのレコード全てを取得して、$postsに代入する
            $posts = News::all();
        }
        
        //index.blade.phpのファイルに取得した$postsレコードと$cond_titleユーザー入力を渡す
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
        // ※index.blade.phpはresources/views/admin/news/内に作成
    }

    
    //Requesutクラス(ユーザーからくる全ての情報)にeditメソッド
    public function edit(Request $request)
    {
        //News Modelからデータを取得する
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.news.edit', ['news_form' => $news]);
    }
    
    
    //Requesutクラス(ユーザーからくる全ての情報)にupdateメソッド
    public function update(Request $request)
    {
        //Validationをかける
        $this->validate($request, News::$rules);
        //Nwes Modelからデータを取得する
        $news = News::find($request->id);
        //送信されてｌきたフォームデータ$news_formに代入する
        $news_form = $request->all();
        //もし$requestの再読み込み画像が同じならば
        if ($request->remove == 'true') {
            //$news_formの画像はnullでそのまま
            $news_form['image_path'] = null;
        //もし$requestの画像が変更された場合は
        } elseif ($request->file('image')) {
            //
            $path = $request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        } else {
            //
            $news_form['image_path'] = $news->image_path;
        }
        
        //フォームから送信されたimageを削除
        unset($news_form['image']);
        //フォームから送信されたremoveを削除
        unset($news_form['remove']);
        //フォームから送信された_tokenを削除
        unset($news_form['_token']);
        //該当するデータを上書き保存する
        $news->fill($news_form)->save();
        //admin/news/createにリダイレクト
        return redirect('admin/news');
    }  
}
      
