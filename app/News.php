<?php
// データ保存用で作成したファイル

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required' , # ※ required → 入力必須
        'body'  => 'required' , 
    );
    
    
    public function histories() # Histories Modelとリレーション(関連付け)
    {
        return $this->hasMany('App\History');
            # ※ hasMany() → リレーションされているテーブル全てを取得する
    }

}
