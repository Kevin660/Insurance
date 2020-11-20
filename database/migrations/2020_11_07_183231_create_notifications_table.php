<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Notification;
class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('type');
            $table->string('content');
            $table->string('link');
            $table->timestamp('read_time')->nullable();
            $table->timestamps();
        });
        
        $data = [
            [
                'id' => 1,
                'user_id' => 4,
                'type' => '討論區',
                'content' => '你的發問有新增一筆回答',
                'link' => '/questions/1#answer-1',
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'type' => '討論區',
                'content' => '你的發問有新增一筆回答',
                'link' => '/questions/1#answer-2',
            ],
            [
                'id' => 3,
                'user_id' => 4,
                'type' => '討論區',
                'content' => '你的發問有新增一筆回答',
                'link' => '/questions/2#answer-3',
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'type' => '討論區',
                'content' => '你的發問有新增一筆回答',
                'link' => '/questions/2#answer-4',
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'type' => '討論區',
                'content' => '你的發問有新增一筆回答',
                'link' => '/questions/3#answer-5',
            ],
            [
                'id' => 6,
                'user_id' => 5,
                'type' => '討論區',
                'content' => '你的發問有新增一筆回答',
                'link' => '/questions/3#answer-6',
            ],
        ];
        foreach($data as $d){
            Notification::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
