<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\ExpertResult;
class CreateExpertResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('option_id');
            $table->foreignId('item_id');
            $table->timestamps();
        });
        // init data
        $data = [
            [
                'id' => 1,
                'option_id' => 15,
                'item_id' => 1,
            ],
            [
                'id' => 2,
                'option_id' => 16,
                'item_id' => 2,
            ],
            [
                'id' => 3,
                'option_id' => 17,
                'item_id' => 3,
            ],
            [
                'id' => 4,
                'option_id' => 18,
                'item_id' => 4,
            ],
            [
                'id' => 5,
                'option_id' => 19,
                'item_id' => 5,
            ],
            [
                'id' => 6,
                'option_id' => 20,
                'item_id' => 6,
            ],
            [
                'id' => 7,
                'option_id' => 21,
                'item_id' => 7,
            ],
            [
                'id' => 8,
                'option_id' => 22,
                'item_id' => 8,
            ],
            [
                'id' => 9,
                'option_id' => 23,
                'item_id' => 9,
            ],
            [
                'id' => 10,
                'option_id' => 24,
                'item_id' => 1,
            ],
            [
                'id' => 11,
                'option_id' => 25,
                'item_id' => 3,
            ],
            [
                'id' => 12,
                'option_id' => 26,
                'item_id' => 4,
            ],
            [
                'id' => 13,
                'option_id' => 27,
                'item_id' => 5,
            ],
            [
                'id' => 14,
                'option_id' => 28,
                'item_id' => 7,
            ],
            [
                'id' => 15,
                'option_id' => 29,
                'item_id' => 10,
            ],
            [
                'id' => 16,
                'option_id' => 30,
                'item_id' => 7,
            ],
            [
                'id' => 17,
                'option_id' => 31,
                'item_id' => 1,
            ],
            [
                'id' => 18,
                'option_id' => 32,
                'item_id' => 7,
            ],
            [
                'id' => 19,
                'option_id' => 33,
                'item_id' => 3,
            ],
        ];

        foreach($data as $d){
            ExpertResult::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expert_results');
    }
}
