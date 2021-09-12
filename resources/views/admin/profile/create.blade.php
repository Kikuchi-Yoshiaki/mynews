{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'プロフィールの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <!-- プロフィールタイトル -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    <!--フォームの送信先が@create  -->
                    <!-- エラーを確認 -->
                    @if (count($errors) > 0)
                        <div class="col-md-12 alert alert-warning">
                            <div style="color: red;">※ 入力漏れの箇所があります。</div>
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- 氏名入力部分 -->    
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="例）鈴木　太郎">
                        </div>
                    </div>
                    
                    <!-- 性別入力部分 -->    
                    <!--<div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </div>-->
                    
                    <!-- 性別ラジオボタン練習用 -->
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10 form-control-lg">
                            <input type="radio" name="gender" id="men" value="男性" checked><label for="men">男性　</label>
                            <input type="radio" name="gender" id="women" value="女性"><label for="women">女性　</label>
                            <input type="radio" name="gender" id="other" value="その他"><label for="other">その他　</label>
                        </div>
                    </div>
                            
                    <!-- 性別プルダウン表示 -->  
                    <!-- <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-2">
                            <select class="form-control" name="gender" value="{{ old('gender') }}">
                                <option class="">男性</option>
                                <option class="">女性</option>
                                <option class="">その他</option>
                            </select>
                        </div>
                    </div>-->      
                    
                    <!-- 趣味入力部分 -->    
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <!--<input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">-->
                            <textarea class="form-control" name="hobby" rows="2"placeholder="読書、ゲーム etc">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    
                    <!-- 趣味チェックボックス -->
                    <!--<div class="form-grou row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <div class="form-control">
                                <input type="checkbox" name="hobby" value="読書">読書
                                <input type="checkbox" name="hobby" value="ゲーム">ゲーム
                                <input type="checkbox" name="hobby" value="旅行">旅行
                                <input type="checkbox" name="hobby" value="料理">料理
                            </div>
                        </div>
                    </div>-->
                    
                    <!-- 自己紹介入力部分 -->
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20" placeholder="300文字以内に自己紹介をしてください。">{{ old('introduction') }}</textarea>
                        </div>
                    </div>     
                    <!-- 更新ボタン -->
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            <!-- カリキュラム22-課題4追加ここまで -->    
            </div>
        </div>
    </div>
@endsection