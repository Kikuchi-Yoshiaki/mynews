<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News;  # News Modelを使う -> app/Http/News.php
use App\History;  # History Modelを使えるようにする -> app/Http/History
use Carbon\Carbon;  # updateActionのCarbon::now()を使う
    


class NewsController extends Controller
{


    
    public function add() // add Action
    {
        return view('admin.news.create'); # (resources/views/admin/news/create.blade.php)
    }



    public function create(Request $request) // create Action(送信されたすべて)
    {
        $this->validate($request, News::$rules);
            # app/News.php(Model)の$rules配列をValidation(検証)する
        
        $news = new News; #$newsをインスタンス化(News)
        $form = $request->all(); # $requestの全てを受け取って$formへ
        
        
        if (isset($form['image'])) #$formの画像がセットされているか確認
        {
            $path = $request->file('image')->store('public/image'); #画像をアップロードして保存=$path
            $news->image_path = basename($path); # $pathをハッシュ(文字列)化して$newsのimage_pathへ
        } else {
            $news->image_path = null; #画像がセットされていなければNULL
        }
        
        unset($form['_token']); # $formのトークンをセットから外す
        unset($form['image']);  # $formの画像をセットから外す
        
        $news->fill($form)->save(); # $news_newsに上記で入力された値を$newsにセットして保存
        
        return redirect('admin/news/create'); #admin/news/createへ移動する
    }



    public function index(Request $request) // index Action(送信されたすべて)
    {
        $cond_title = $request->cond_title; # $requestの$cond_titleを$cond_titleへ代入
            # ※今回はindex,blade.phpのvalue属性なので、入力された値
            
        if ($cond_title != '') {  # $cond_titleがあれば(!='')
            $posts = News::where('title', $cond_title)->get(); # titleテーブルと$cond_titleが一致するレコードを$postsへ
                # News::where->Newsテーブルのtitleレコード
        } else {
            $posts = News::all(); # 空白だった場合はNewsテーブル全てを$postsへ代入
        }
        
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
            # index.blade.phpのpostsを$posts(配列)へ、cond_titleを$sond_titleにする
    }


    
    public function edit(Request $request)  // index Action(送信されたすべて)
    {
        $news = News::find($request->id); # News Modelからデータを取得する
        
        if (empty($news)) { # $newsの中身が空であれば
            abort(404); # 404 Not Foundへ
        }
        
        return view('admin.news.edit', ['news_form' => $news]);
            # edit.blade.phpのnews_formを$newsにする
    }
    
    

    public function update(Request $request) // update Action(送信されたすべて)
    {
        $this->validate($request, News::$rules);
            # app/News.php(Model)の$rules配列をValidation(検証)する
            
        $news = News::find($request->id); # News Modelからデータを取得する
        $news_form = $request->all(); # $requestの全てを受け取って$news_formへ
        
        if ($request->remove == 'true') {  # 再読み込みした$requesutがそのままだった時は
                # ※->remove(再読み込み)
            $news_form['image_path'] = null; # $news_formのimage_pathはNULL
        } elseif ($request->file('image')) { # $requestの画像ファイルが更新された時は
            $path = $request->file('image')->store('public/image');
                # 更新された画像をアップロードして$pathに代入
            $news_form['image_path'] = basename($path);
                # $pathをハッシュ(文字列)化させて$news_formのimage_pathに代入
        } else {
            $news_form['image_path'] = $news->image_path;
                # そのどちらでもなければ$newsのimage_pathを$news_formのimage_pathに代入
        }
        
        unset($news_form['image']);  # $news_formの画像をセットから外す
        unset($news_form['remove']); # 再読み込みされた$news_formをセットから外す
        unset($news_form['_token']); # $news_formのトークンをセットから外す
        
        $news->fill($news_form)->save(); # $news_newsに上記で入力された値を$newsにセットして上書き保存
        
        
        // ※History Modelにも編集履歴を追加できるようにする処理
        $history = new History(); # $historyをインスタンス化(History)
        $history->news_id = $news->id; # $newsのidを$historyのnews_idに代入
        $history->edited_at = Carbon::now(); # 入力された現在時刻を$historyのedited_atに代入
            #Carbon::now()日時操作
        $history->save(); # $historyを保存
        
        return redirect('admin/news'); #admin/newsへ移動する
    }  
    
    
    
    public function delete(Request $request)  // delete Action(送信されたすべて)
    {
        $news = News::find($request->id); # News Modelからデータを取得する
        $news->delete(); # $newsを削除する
        
        return redirect('admin/news'); #admin/newsへ移動する
    }

}
      
