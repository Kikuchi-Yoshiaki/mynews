<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //protected=クラスと継承クラスからアクセス可能
    protected $guarded = array('id');
    
    public static $rules = array(
        'news_id'   => 'required', //news_id=>必須入力
        'edited_at' => 'required', //edited_at=>必須入力
        
    );

    
    
}
