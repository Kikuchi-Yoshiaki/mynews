<!-- =resources/views/layouts/admin.blade.phpから継承=-->
@extends('layouts.admin')

<!-- ='content'を定義= -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-box card">
                    <div class="login-header card-header mx-auto">{{ __('messages.Login') }}</div>
                    
                    <!-- =送信部分= -->
                    <div class="login-body card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <!-- =メール入力部分== -->
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>
                            
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    
                                    <!-- =メールエラー時の条件分岐= -->
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- =パスワードへルパ関数= -->           
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}</label>
                                
                                <!-- =パスワード入力部分= -->
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> 
                                    
                                    <!-- =パスワードエラー時の条件分岐=-->
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>  
                            </div>      
                            
                            <!-- =ログイン記録= -->
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{old('remember') ? 'checked' : '' }}> {{ __('messages.Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- =送信ボタン= -->
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>  
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

