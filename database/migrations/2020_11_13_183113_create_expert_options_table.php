<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\ExpertOption;
class CreateExpertOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->foreignId('next_question_id')->nullable();
            $table->string('name');
            $table->timestamps();
        });
        // init_data
        $data = [
            [
                'id' => 1,
                'question_id' => '1',
                'name' => '個人風險(尚未開放)',
            ],
            [
                'id' => 2,
                'question_id' => '1',
                'next_question_id' => '2',
                'name' => '企業風險',
            ],
            [
                'id' => 3,
                'question_id' => '2',
                'next_question_id' => '3',
                'name' => '資訊科技',
            ],
            [
                'id' => 4,
                'question_id' => '2',
                'next_question_id' => '4',
                'name' => '工廠製造',
            ],
            [
                'id' => 5,
                'question_id' => '2',
                'next_question_id' => '5',
                'name' => '教育服務',
            ],
            [
                'id' => 6,
                'question_id' => '3',
                'next_question_id' => '6',
                'name' => '5人以內',
            ],
            [
                'id' => 7,
                'question_id' => '3',
                'next_question_id' => '6',
                'name' => '5~50人',
            ],
            [
                'id' => 8,
                'question_id' => '3',
                'next_question_id' => '6',
                'name' => '50人以上',
            ],
            [
                'id' => 9,
                'question_id' => '4',
                'next_question_id' => '7',
                'name' => '5人以內',
            ],
            [
                'id' => 10,
                'question_id' => '4',
                'next_question_id' => '7',
                'name' => '5~50人',
            ],
            [
                'id' => 11,
                'question_id' => '4',
                'next_question_id' => '7',
                'name' => '50人以上',
            ],
            [
                'id' => 12,
                'question_id' => '5',
                'next_question_id' => '8',
                'name' => '5人以內',
            ],
            [
                'id' => 13,
                'question_id' => '5',
                'next_question_id' => '8',
                'name' => '5~50人',
            ],
            [
                'id' => 14,
                'question_id' => '5',
                'next_question_id' => '8',
                'name' => '50人以上',
            ],
            [
                'id' => 15,
                'question_id' => '6',
                'name' => '業務過失',
            ],
            [
                'id' => 16,
                'question_id' => '6',
                'name' => '資安風險',
            ],
            [
                'id' => 17,
                'question_id' => '6',
                'name' => '電子設備毀損',
            ],
            [
                'id' => 18,
                'question_id' => '6',
                'name' => '員工不誠實行為',
            ],
            [
                'id' => 19,
                'question_id' => '6',
                'name' => '產品瑕疵',
            ],
            [
                'id' => 20,
                'question_id' => '6',
                'name' => '意外侵犯他人智慧財產權',
            ],
            [
                'id' => 21,
                'question_id' => '6',
                'name' => '火災',
            ],
            [
                'id' => 22,
                'question_id' => '7',
                'name' => '鍋爐爆炸',
            ],
            [
                'id' => 23,
                'question_id' => '7',
                'name' => '機械設備毀損',
            ],
            [
                'id' => 24,
                'question_id' => '7',
                'name' => '業務過失',
            ],
            [
                'id' => 25,
                'question_id' => '7',
                'name' => '電子設備毀損',
            ],
            [
                'id' => 26,
                'question_id' => '7',
                'name' => '員工不誠實行為',
            ],
            [
                'id' => 27,
                'question_id' => '7',
                'name' => '產品瑕疵',
            ],
            [
                'id' => 28,
                'question_id' => '7',
                'name' => '火災',
            ],
            [
                'id' => 29,
                'question_id' => '8',
                'name' => '顧客受傷',
            ],
            [
                'id' => 30,
                'question_id' => '8',
                'name' => '業務過失',
            ],
            [
                'id' => 31,
                'question_id' => '8',
                'name' => '火災',
            ],
            [
                'id' => 32,
                'question_id' => '8',
                'name' => '電子設備毀損',
            ],
        ];
        foreach($data as $d){
            ExpertOption::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expert_options');
    }
}
