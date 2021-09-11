<?php

//データ保存用で作成したファイル
namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //protected=クラスと継承クラスからアクセス可能
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required' , //title=>必須入力
        'body'  => 'required' , //body=>必須入力
    );
    
    //Histry Modelと関連付けさせる
    public function histories()
    {
        //hasMany=複数との関連付け
        return $this->hasMany('App\History');
    }

}
