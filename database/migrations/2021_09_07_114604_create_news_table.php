<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    //up関数-Migration実行時のコードを書く
    public function up()
    {
        //テーブル名:news
        Schema::create('news', function (Blueprint $table) {
           $table->bigIncrements('id');  //id=>主キー
           $table->string('title');  //タイトルカラム
           $table->string('body');  //ニュースの本文カラム
           $table->string('image_path')->nullable();  //画像テーブルnullableは画像パスは空でも保存可の意味
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
    //down関数-Migrationの取り消しをするためのコードを書く
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
