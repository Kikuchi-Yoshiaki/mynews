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
    public function up()
    {
        //テーブル名:profiles
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id'); //id=>主キー
            $table->string('name');  //名前カラム
            $table->string('gender');  //性別カラム
            $table->string('hobby');  //趣味カラム
            $table->string('introduction');  //自己紹介カラム
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
