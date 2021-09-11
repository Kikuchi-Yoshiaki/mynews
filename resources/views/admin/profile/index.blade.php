{{-- resources/layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
{{-- admin.blade.phpの@yield('title')に'登録済みのニュース一覧'を埋め込む --}}
@section('title', '登録済みのプロフィール一覧')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <!-- ニュース一覧タイトル -->
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
    <!-- 新規作成ボタン -->
    <div class="row">
        <div class="col-md-4">
            {{-- add/app/Http/controllers/Admin/NewsControllerのadd()へ --}}
            <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
        <!-- タイトル入力部分 -->
        <div class="col-md-8">
            {{-- add/app/Http/controllers/Admin/NewsControllerのindex()へ送る --}}
            <form action="{{ action('Admin\ProfileController@index') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">名前</label>
                    <div class="col-md-8">
                        {{-- ここの内容が$cond_titleに代入される --}}
                        <input type="text" class="form-control" name="cond_profile" value="{{ $cond_profile }}">
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>    
    </div>
            
    <!-- 検索結果タイトル表示画面 -->
    <div class="row">
        <div class="list-news col-md-12 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                         <tr>
                            {{-- テーブルの横幅を指定 --}}
                            <th width="10%">ID</th>
                            <th width="20%">名前</th>
                            <th width="10%">性別</th>
                            <th width="20%">趣味</th>
                            <th width="30%">自己紹介</th>
                        </tr>
                    </thead>
                    <!-- 検索結果表示画面 -->
                    <tbody>
                        {{-- $posts配列をforeach --}}
                        @foreach($profiles as $profile)
                            <tr>
                                <th>{{ $profile->id }}</th>
                                {{-- 文字列を指定した数値まで表示(全角は２文字分) --}}
                                <td>{{ \Str::limit($profile->name, 100) }}</td>
                                <td>{{ \Str::limit($profile->gender, 100) }}</td>
                                <td>{{ \Str::limit($profile->hobby, 100) }}</td>
                                <td>{{ \Str::limit($profile->introduct, 250) }}</td>
                                <td>
                                    <div>
                                        <!-- ProfileControllerのeditActionがリンク先（idを指定）編集する -->
                                        <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <!-- ProfileControllerのeditActionがリンク先（idを指定）削除する -->
                                        <a href="{{ action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>                
                </table>
            </div>
        </div>                        
    </div>
</div>    
@endsection                                    
                                    
                                
                                      
                    
           
           