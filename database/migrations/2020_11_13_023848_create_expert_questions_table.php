<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\ExpertQuestion;
class CreateExpertQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('multiple');
            $table->string('type');
            $table->timestamps();
        });
        // init_data
        $data = [
            [
                'id' => 1,
                'name' => '您要處理個人風險或是企業風險?',
                'multiple' => 0,
                'type' => 'root',
            ],
            [
                'id' => 2,
                'name' => '您從事哪個行業?',
                'multiple' => 0,
                'type' => 'normal',
            ],
            [
                'id' => 3,
                'name' => '包括您在內，您的公司有多少名員工?',
                'multiple' => 0,
                'type' => 'normal',
            ],
            [
                'id' => 4,
                'name' => '包括您在內，您的公司有多少名員工?',
                'multiple' => 0,
                'type' => 'normal',
            ],
            [
                'id' => 5,
                'name' => '包括您在內，您的公司有多少名員工?',
                'multiple' => 0,
                'type' => 'normal',
            ],
            [
                'id' => 6,
                'name' => '您認為哪些是企業內的潛在風險？',
                'multiple' => 1,
                'type' => 'end',
            ],
            [
                'id' => 7,
                'name' => '您認為哪些是企業內的潛在風險？',
                'multiple' => 1,
                'type' => 'end',
            ],
            [
                'id' => 8,
                'name' => '您認為哪些是企業內的潛在風險？',
                'multiple' => 1,
                'type' => 'end',
            ],
        ];
        foreach($data as $d){
            ExpertQuestion::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expert_questions');
    }
}
