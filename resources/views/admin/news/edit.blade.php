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
                <!-- NewsControllerのupdateActionがリンク先 -->
                <form action="{{ action('Admin\NewsController@update') }}" method='post' enctype="multipart/form-data">
                    
                    <!-- エラーを確認 -->
                    @if (count($errors) > 0)
                        <div class="col-md-12 alert alert-primary">
                            <div style="color: red;">※ 入力漏れの箇所があります。</div>
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        
                    <!-- タイトル入力部分 -->
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <!-- $news_formのtitle部分を表示 -->
                            <input type="text" class="form-control" name="title" value="{{ $news_form->title }}">
                        </div>
                    </div>
                                
                    <!-- 本文入力部分 -->
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <!-- $news_formのbody部分を表示 -->
                            <textarea class="form-control" name="body" rows="20">{{ $news_form->body }}</textarea>
                        </div>
                    </div>
                        
                    <!-- 画像挿入部分 -->
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                <!-- 設定してあるハッシュ化のimage_pathを表示 -->
                                設定中：{{ $news_form -> image_path }}
                            </div>
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
                            <!-- type="hidden"->隠しデータを送信 -->
                            <input type="hidden" name="id" value="{{ $news_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <!-- 編集履歴表示画面 -->
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            <!-- 編集履歴が存在した場合の処理 -->
                            @if ($news_form->histories != NULL)
                                <!-- 編集履歴を一つずつ取り出して表示 -->
                                @foreach ($news_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

