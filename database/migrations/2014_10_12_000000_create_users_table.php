<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); # 每張表都會有

            $table->string('role'); # 角色
            $table->string('chinese_name'); # 中文名稱
            $table->date('birthday'); # 生日
            $table->tinyInteger('gender'); # 性別
            $table->string('address'); # 地址
            $table->string('email')->unique(); # 電子信箱
            $table->string('number_home')->nullable(); # 連絡電話(市話)
            $table->string('number_cellphone'); # 連絡電話(手機)
            $table->string('serve_area')->nullable(); # 服務地區
            $table->string('serve_item')->nullable(); # 服務項目
            $table->integer('serve_experience')->nullable(); # 服務資歷
            $table->string('license')->nullable(); # 相關證照
            $table->string('other')->nullable(); # 備註
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->rememberToken(); # users系統保留
            $table->timestamps(); # 所有的表都會有 create_time, update_time
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
