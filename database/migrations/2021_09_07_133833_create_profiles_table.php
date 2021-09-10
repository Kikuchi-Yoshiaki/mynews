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
        //テーブル名:profile
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id'); //id=>主キー
            $table->string('name');  //プロフィールの名前カラム
            $table->string('gender');  //プロフィールの性別カラム
            $table->string('hobby');  //プロフィールの趣味カラム
            $table->string('introduction');  //プロフィールの自己紹介カラム
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
