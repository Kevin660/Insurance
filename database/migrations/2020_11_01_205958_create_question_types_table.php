<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\QuestionType;
class CreateQuestionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->foreignId('type_id');
            $table->timestamps();
        });
        $data = [
            [
                'id' => 1,
                'question_id' => 1,
                'type_id' => 9,
            ],
            [
                'id' => 2,
                'question_id' => 1,
                'type_id' => 10,
            ],
            [
                'id' => 3,
                'question_id' => 2,
                'type_id' => 9,
            ],
            [
                'id' => 4,
                'question_id' => 2,
                'type_id' => 10,
            ],
            [
                'id' => 5,
                'question_id' => 3,
                'type_id' => 6,
            ],
            [
                'id' => 6,
                'question_id' => 3,
                'type_id' => 11,
            ],
        ];
        foreach($data as $d){
            QuestionType::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_types');
    }
}
