<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() # Migration実行時にカラムを定義する
    {
        
        Schema::create('profiles', function (Blueprint $table) { # Profileテーブルに新しくカラムを作る
            # ※ Schema(構造) Blueprint(設計図)
        
            $table->bigIncrements('id');      # id=>主キー
            $table->string('name');           # titleカラム
            $table->string('gender');         # 性別カラム
            $table->string('hobby');          # hobbyカラム
            $table->string('introduction');   # introduction(自己紹介)カラム
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() # テーブルを削除する
    {
        Schema::dropIfExists('profiles');
    }
}
