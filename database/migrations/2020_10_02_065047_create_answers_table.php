<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Answer;
class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->foreignId('user_id');
            $table->string("content");
            $table->timestamps();
        });
        $data = [
            [
                'id' => 1,
                'question_id' => 1,
                'user_id' => 1,
                'content' => '可以向財團法人特別補償基金提出申請補償',
            ],
            [
                'id' => 2,
                'question_id' => 1,
                'user_id' => 2,
                'content' => '特別補償基金會理賠醫藥費，但是機車修理費不會理賠。另外，你是學生，還可以向學校申請學生保險。還有疑問歡迎諮詢我，祝你早日康復！',
            ],
            [
                'id' => 3,
                'question_id' => 2,
                'user_id' => 1,
                'content' => '疲勞駕駛意外險應該要理賠吧！因為是撞到安全島才死亡，算是意外吧！',
            ],
            [
                'id' => 4,
                'question_id' => 2,
                'user_id' => 2,
                'content' => '疲勞駕駛算是疾病吧！它不是突然事故造成的死亡，意外險應該不理賠',
            ],
            [
                'id' => 5,
                'question_id' => 3,
                'user_id' => 2,
                'content' => '員工工作中受傷，雇主要移轉風險，要投保團體傷害險，醫療保險，失能保險，長期照顧險',
            ],
            [
                'id' => 6,
                'question_id' => 3,
                'user_id' => 2,
                'content' => '員工工作中受傷，雇主要投保雇主意外責任險及雇主補償契約責任險才能移轉風險',
            ],
        ];
        foreach($data as $d){
            Answer::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
