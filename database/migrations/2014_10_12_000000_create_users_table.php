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
            $table->id();
            $table->string('role'); # 角色
            $table->string('chinese_name'); # 中文名稱
            $table->string('english_name'); # 英文名稱
            $table->date('birthday'); # 生日
            $table->tinyInteger('gender'); # 性別
            $table->string('address'); # 地址
            $table->string('serve_area'); # 服務地區
            $table->string('email')->unique(); # 電子信箱
            $table->string('number_home'); # 連絡電話(市話)
            $table->string('number_cellphone'); # 連絡電話(手機)
            $table->string('service_item'); # 服務項目
            $table->integer('service_experience'); # 服務資歷
            $table->string('license'); # 相關證照
            $table->string('other'); # 備註
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
