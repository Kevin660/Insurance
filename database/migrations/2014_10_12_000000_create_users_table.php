<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

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
                'id' => 1,
                'img' => 'sales1.jpg',
                'role' => '1',
                'company' => '太陽保經',
                'chinese_name' => '王小美',
                'birthday' => '1995-02-07',
                'gender' => '2',
                'address' => '雲林縣斗六市大學路3段123號',
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
                'password' => Hash::make('abcd1234'),
            ],
            
            [
                'id' => 2,
                'img' => 'sales2.jpg',
                'role' => '1',
                'company' => '晨星保經',
                'chinese_name' => '林小彤',
                'birthday' => '1990-09-30',
                'gender' => '1',
                'address' => '雲林縣斗六市大學路3段123號',
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
                'password' => Hash::make('abcd1234'),
            ],
            
            [
                'id' => 3,
                'img' => 'sales3.jpg',
                'role' => '1',
                'company' => '幸福保經',
                'chinese_name' => '張大華',
                'birthday' => '1997-12-17',
                'gender' => '1',
                'address' => '雲林縣斗六市大學路3段123號',
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
                'password' => Hash::make('abcd1234'),
            ],                    
            [
                'id' => 4,
                'img' => 'user1.jpg',
                'role' => '2',
                'chinese_name' => '王曉明',
                'birthday' => '1996-10-27',
                'gender' => '1',
                'address' => '雲林縣斗六市大學路3段123號',
                'email' => 'user1@mail.com',
                'number_home' => '022667777',
                'number_cellphone' => '0912345678',
                'other' => '',
                'enabled' => 1,
                'email_verified_at' => '2020-11-01',
                'password' => Hash::make('user1234'),
            ],            
            [
                'id' => 5,
                'img' => 'user2.jpg',
                'role' => '2',
                'chinese_name' => '王小貴',
                'birthday' => '1990-02-21',
                'gender' => '2',
                'address' => '雲林縣斗六市大學路3段123號',
                'email' => 'user2@mail.com',
                'number_home' => '022667777',
                'number_cellphone' => '0912345678',
                'other' => '',
                'enabled' => 1,
                'email_verified_at' => '2020-11-01',
                'password' => Hash::make('user1234'),
            ],
            [
                'id' => 6,
                'img' => 'sales4.jpg',
                'role' => '1',
                'company' => '璞玉保經',
                'chinese_name' => '潘卡咪',
                'birthday' => '1993-2-17',
                'gender' => '1',
                'address' => '雲林縣斗六市龍潭路43巷38-2號',
                'email' => 'KAMIGI@mail.com',
                'number_home' => '0287878787',
                'number_cellphone' => '0987987987',
                'serve_area' => '台中市、雲林縣、彰化縣',
                'serve_experience' => 1,
                'introduction' => '我是卡咪，很高興能為您服務。',
                'other' => '',
                'score' => 50,
                'enabled' => 1,
                'email_verified_at' => '2020-11-01',
                'password' => Hash::make('abcd1234'),
            ],       
            [
                'id' => 7,
                'img' => 'sales5.jpg',
                'role' => '1',
                'company' => '綠茶保經',
                'chinese_name' => '王查理',
                'birthday' => '1995-1-12',
                'gender' => '1',
                'address' => '台中市大甲區信義路5弄27號',
                'email' => 'shortlegs@mail.com',
                'number_home' => '0455555555',
                'number_cellphone' => '0912121212',
                'serve_area' => '台中市、南投縣、彰化縣',
                'serve_experience' => 1,
                'introduction' => '我是查理，歡迎來找我諮詢',
                'other' => '',
                'score' => 75,
                'enabled' => 1,
                'email_verified_at' => '2020-11-01',
                'password' => Hash::make('abcd1234'),
            ],       
            [
                'id' => 8,
                'img' => 'sales6.jpg',
                'role' => '1',
                'company' => '懶人房保經',
                'chinese_name' => '神小闇',
                'birthday' => '1998-3-26',
                'gender' => '1',
                'address' => '南投縣草屯鎮民生路88號',
                'email' => 'holynight@mail.com',
                'number_home' => '0498765432',
                'number_cellphone' => '0956412222',
                'serve_area' => '南投縣、彰化縣、雲林縣',
                'serve_experience' => 1,
                'introduction' => '我是小闇，能夠為您解決所有保險問題',
                'other' => '',
                'score' => 87,
                'enabled' => 1,
                'email_verified_at' => '2020-11-01',
                'password' => Hash::make('abcd1234'),
            ],       

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
