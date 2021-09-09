{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

    <!-- タイトル部分 -->    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース編集</h2>
                <form action="{{ action('Admin\NewsController@update') }}" method='post' enctype="multipart/form-data">
                    
                    <!-- エラーを確認 -->
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
        
                    <!-- タイトル入力部分 -->
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $news_form->title }}">
                        </div>
                    </div>
                                
                    <!-- 本文入力部分 -->
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $news_form->body }}</textarea>
                        </div>
                    </div>
                        
                    <!-- 画像挿入部分 -->
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        //画像選択ボタン
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            //imageパスを表示
                            <div class="form-text text-info">
                                設定中： {{ $news_form->image_path }}
                            </div>
                            //画像削除
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>    
                        </div>
                    </div>   
                    
                    <!-- 更新ボタン -->    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $news_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


