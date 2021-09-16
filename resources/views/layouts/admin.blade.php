<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 認証済ユーザーのリクエスト送信を確認 --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- 作成したpublic/css/admin.cssを読み込む --}}
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            
            {{-- ここから画面上部のナビゲーションバー --}}
            <nav class="navbar navbar-dark navbar-expand-md navbar-laravel">
                <div class="container">
                    <a class="navbar-brand rounded" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                           <li class="sub-title">　Let's post the MyNews!</li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            
                            
                        <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="btn btn-lg btn-dark" href="{{ route('login') }}">{{ __('messages.Login')."する" }}</a></li>
                            
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-pills dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                    {{ "ようこそ".Auth::user()->name."さん!" }}<span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>            
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item nav-list"><a class="active sub-link" href="{{ url('/') }}">トップページ</a></li>
                <li class="nav-item nav-list"><a class="active sub-link" href="{{ url('/admin/news/create') }}">ニュースを投稿</a></li>
                <li class="nav-item nav-list"><a class="active sub-link" href="{{ url('/profile') }}">記者一覧</a></li>
                <li class="nav-item nav-list"><a class="active sub-link" href="{{ url('/admin/profile/create') }}">記者になる</a></li>
                <li class="nav-item nav-list"><a class="active sub-link" href="{{ url('/admin/news/edit') }}">空き枠１</a></li>
                <li class="nav-item nav-list"><a class="active sub-link" href="{{ url('/register') }}">空き枠２</a></li>
            </ul>
            
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>