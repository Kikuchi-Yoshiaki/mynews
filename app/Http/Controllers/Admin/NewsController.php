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
        
        
        //admin/news/createにリダイレクト
        return redirect('admin/news/create');
    }


}
