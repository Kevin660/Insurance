<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QandATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Q', function (Blueprint $table) {
            $table->id(); # 每張表都會有

            $table->string('Question'); # 問題內容
            $table->string('users_name'); # 用戶名稱
                        
            $table->timestamps(); # 所有的表都會有 create_time, update_time
        });
        Schema::create('A', function (Blueprint $table) {
            $table->id(); # 每張表都會有

            $table->string('Question_id'); # 回答的問題
            $table->string('users_name'); # 用戶名稱
            $table->string('Answer'); # 回答內容
            $table->timestamps(); # 所有的表都會有 create_time, update_time

            $table->foreign('Question_id')->references('id')->on('Q');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Q');
        Schema::dropIfExists('A');
    }
}
