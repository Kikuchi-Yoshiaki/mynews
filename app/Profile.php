<?php

//データ保存用で作成したファイル
namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //ここにValidationを設定
    protected $guarded = array('id');
    
    public static $rules = array(
        'name'         => 'required',    
        'gender'       => 'required',
        'hobby'        => 'required',
        'introduction' => 'required',
    );
}
