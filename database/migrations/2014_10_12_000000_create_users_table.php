<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Crypt;

use \App\User;
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

            $table->string('img'); # 頭貼
            $table->string('role')->comment("[1 => sale, 2 => user]"); # 角色
            $table->string('company'); # 所屬保經
            $table->string('chinese_name'); # 中文名稱
            $table->date('birthday'); # 生日
            $table->tinyInteger('gender')->comment('[1 => male, 2 => female]'); # 性別
            $table->string('address'); # 地址
            $table->string('email')->unique(); # 電子信箱
            $table->string('number_home')->nullable(); # 連絡電話(市話)
            $table->string('number_cellphone'); # 連絡電話(手機)
            $table->string('serve_area')->nullable(); # 服務地區
            $table->integer('serve_experience')->nullable(); # 服務資歷
            $table->string('introduction')->nullable(); # 個人介紹
            $table->string('other')->nullable(); # 備註
            $table->integer('score')->default(0); # 評分
            $table->integer('enabled')->default(0); # 啟用
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->rememberToken(); # users系統保留
            $table->timestamps(); # 所有的表都會有 create_time, update_time
        });    

        // init_data
        $data = [
            [
                'img' => 'sales1.jpg',
                'role' => '1',
                'company' => '太陽保經',
                'chinese_name' => '王小美',
                'birthday' => '1995-02-07',
                'gender' => '2',
                'address' => '',
                'email' => 'B10623007@yuntech.edu.tw',
                'number_home' => '022667777',
                'number_cellphone' => '0912345678',
                'serve_area' => '台北市、新竹縣、新北市、桃園市、新竹市',
                'serve_experience' => 4,
                'introduction' => '您好~我是太陽保經的小美',
                'other' => '',
                'score' => 100,
                'enabled' => 1,
                'email_verified_at' => '2020-11-01',
                'password' => Crypt::encryptString('abcd1234'),
            ],
            
            [
                'img' => 'sales2.jpg',
                'role' => '1',
                'company' => '晨星保經',
                'chinese_name' => '林小彤',
                'birthday' => '1990-09-30',
                'gender' => '1',
                'address' => '',
                'email' => 'B10623058@yuntech.edu.tw',
                'number_home' => '055776666',
                'number_cellphone' => '0986012345',
                'serve_area' => '彰化縣、雲林縣、嘉義縣、台南市',
                'serve_experience' => 2,
                'introduction' => '您好~我是小彤，歡迎與我聯絡唷～',
                'other' => '',
                'score' => 16,
                'enabled' => 1,
                'email_verified_at' => '2020-11-01',
                'password' => Crypt::encryptString('user1234'),
            ],
            
            [
                'img' => 'sales3.jpg',
                'role' => '1',
                'company' => '幸福保經',
                'chinese_name' => '張大華',
                'birthday' => '1997-12-17',
                'gender' => '1',
                'address' => '',
                'email' => 'B10623022@yuntech.edu.tw',
                'number_home' => '022667777',
                'number_cellphone' => '0912345678',
                'serve_area' => '台中市、苗栗縣、南投縣、彰化縣',
                'serve_experience' => 1,
                'introduction' => '我是大華，讓我為您打造最適合的保險規劃',
                'other' => '',
                'score' => 25,
                'enabled' => 1,
                'email_verified_at' => '2020-11-01',
                'password' => Crypt::encryptString('1234user'),
            ]
        ];
        foreach($data as $d){
            User::create($d);
        }
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
