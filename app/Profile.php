<?php

//データ保存用で作成したファイル
namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //protected=クラスと継承クラスからアクセス可能
    protected $guarded = array('id');
    
    public static $rules = array(
        'name'         => 'required', //name=>必須入力    
        'gender'       => 'required', //gender=>必須入力
        'hobby'        => 'required', //hobby=>必須入力
        'introduction' => 'required', //introduction=>必須入力
    );
    
    //ProfileHistry Modelと関連付けさせる
    public function profile_histories()
    {
        //hasMany=複数との関連付け
        return $this->hasMany('App\ProfileHistory');
    }
}
