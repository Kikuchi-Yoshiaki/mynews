<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() # Migration実行時にカラムを定義する
    {
        
        Schema::create('profile_histories', function (Blueprint $table) { # Profile_Historiesテーブルに新しくカラムを作る
            $table->increments('id');       # id=>主キー
            $table->integer('profile_id');  # profile_id(INT型整数)カラム
            $table->string('edited_at');    # edited_at(STRING型文字列)カラム
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
        Schema::dropIfExists('profile_histories');
    }
}
