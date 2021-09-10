{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'Myプロフィール')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                    <form action="{{ action('Admin\ProfileController@update') }}" method='post' enctype='multipart/form-data'>
                        
                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        
                        <div class="from-group row">
                            <label class="col-md-2" for='name'>名前</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                            </div>
                        </div>
                        
                        <div class="from-group row">
                            <label class="col-md-2" for='name'>性別</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="body" value="{{ $profile_form->gender }}">
                            </div>
                        </div>
                        
                        <div class="from-group row">
                            <label class="col-md-2" for='name'>趣味</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="hobby" value="{{ $profile_form->hobby }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <label class="col-md-2" for="body">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduct" rows="20">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                        
                    <div class="form-group row">
                        <div class="col-md-10">
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