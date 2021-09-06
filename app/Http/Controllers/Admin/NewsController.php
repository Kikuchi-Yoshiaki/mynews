<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('admin.news.create');
    }

//カリキュラム22の追加部分
    public function create(Request $request)
    {
        // admin/news/createにリダイレクト
        return redirect('admin/news/create');
    }


}
