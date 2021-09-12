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
    public function up() # Migration実行時にカラムを定義する
    {
        
        Schema::create('news', function (Blueprint $table) { # Newsテーブルに新しくカラムを作る
            # ※ Schema(構造) Blueprint(設計図)
            
           $table->bigIncrements('id');                # id=>主キー
           $table->string('title');                    # titleカラム
           $table->string('body');                     # bodyカラム
           $table->string('image_path')->nullable();   # image_pathカラム
                # ※nullableは画像パスは空でも保存可の意味
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
        Schema::dropIfExists('news');
    }
}
