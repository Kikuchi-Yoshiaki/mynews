@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-10">
                                <div class="date">
                                    <label>登録日時 : </label>
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title mt-10">
                                    <label class="name">名前 : </label>
                                    {{ str_limit($post->name, 30) }}
                                </div>
                                <div class="body mt-10">
                                    <label class="gender">性別 : </label>
                                    {{ str_limit($post->gender, 20) }}
                                </div>
                                <div class="body mt-10">
                                    <label class="hobby">趣味 : </label>
                                    {{ str_limit($post->hobby, 100) }}
                                </div>
                                <div class="body mt-10">
                                    <label class="introduction">自己紹介 : </label><br>
                                    {{ str_limit($post->introduction, 300) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection
                               
             
                                        
                                    
                                
            
                    
    
                            






