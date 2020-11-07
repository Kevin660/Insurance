<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Question;
class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('answer_id')->nullable(); # accpeted one by the user
            $table->string("title");
            $table->string("content");
            $table->integer("viewCount")->default(0);
            $table->timestamps();
        });
        $data = [
            [
                'id' => 1,
                'user_id' => 4,
                'title' => '車禍了，對方肇事逃逸怎麼辦?',
                'content' => '我是學生，上禮拜騎機車被開車的人撞倒，但是對方肇事逃逸了，報警也抓不到人，我的醫藥費花了6000千元，機車修理費花了2萬元，該怎麼辦？',
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'title' => '疲勞駕駛撞到安全島死亡意外險有理賠嗎？',
                'content' => '疲勞駕駛撞到安全島死亡意外險有理賠嗎？',
            ],
            [
                'id' => 3,
                'user_id' => 5,
                'title' => '要如何投保才能移轉雇主的風險',
                'content' => '員工在工作中受傷致失能，向雇主求償醫療費用，長期看護費用，勞動能力減損致工作收入損失，要如何投保才能移轉雇主的風險？',
            ]
        ];
        foreach($data as $d){
            Question::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
