<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //admin/news/createにリダイレクト
        return redirect('admin/news/create');
    }


}
