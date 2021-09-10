{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'Myプロフィール')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    
    <!-- タイトル部分 -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                    <!-- ProfileControllerのupdateActionがリンク先 -->
                    <form action="{{ action('Admin\ProfileController@update') }}" method='post' enctype='multipart/form-data'>
                        
                        <!-- エラーを確認 -->
                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        
                        <!-- 名前入力部分 -->
                        <div class="form-group row">
                            <label class="col-md-2" for='name'>名前</label>
                            <div class="col-md-10">
                                <!-- $profile_formのname部分を表示 -->
                                <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                            </div>
                        </div>
                        
                        <!-- 性別入力部分 -->
                        <div class="form-group row">
                            <label class="col-md-2" for='name'>性別</label>
                            <div class="col-md-10">
                                <!-- $profile_formのgender部分を表示 -->
                                <input type="text" class="form-control" name="body" value="{{ $profile_form->gender }}">
                            </div>
                        </div>
                        
                        <!-- 趣味入力部分 -->
                        <div class="form-group row">
                            <label class="col-md-2" for='name'>趣味</label>
                            <div class="col-md-10">
                                <!-- $profile_formのhobby部分を表示 -->
                                <input type="text" class="form-control" name="hobby" value="{{ $profile_form->hobby }}">
                            </div>
                        </div>
                        
                        <!--自己紹介入力部分 -->
                        <div class="form-group row">
                        <label class="col-md-2" for="body">自己紹介</label>
                        <div class="col-md-10">
                            <!-- $profile_formのintroduct部分を表示 -->
                            <textarea class="form-control" name="introduct" rows="20">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    
                    <!-- 更新ボタン -->    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <!-- type="hidden"->隠しデータを送信 -->
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection