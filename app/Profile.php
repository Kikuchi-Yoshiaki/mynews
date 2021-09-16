<?php

//データ保存用で作成したファイル
namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'name'         => 'required', # ※ required → 入力必須
        'gender'       => 'required',
        'hobby'        => 'required',
        'introduction' => 'required',
    );
    
    
    public function profile_histories() # Profire_Histories Modelとリレーション(関連付け)
    {
        return $this->hasMany('App\ProfileHistory');
            # ※ hasMany() → リレーションされているテーブル全てを取得する
    }

    
    
}

