<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\ExpertRecord;
class CreateExpertRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('sale_id');
            $table->timestamps();
        });
        $data = [
            [
                'id' => 1,
                'user_id' => 4,
                'sale_id' => 3,
                'created_at' => '2020-11-10 18:15:10',
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'sale_id' => 1,
                'created_at' => '2020-11-15 18:15:10',
            ],
            [
                'id' => 3,
                'user_id' => 4,
                'sale_id' => 2,
                'created_at' => '2020-11-19 18:15:10',
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'sale_id' => 3,
                'created_at' => '2020-11-21 18:15:10',
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'sale_id' => 3,
                'created_at' => '2020-11-10 18:15:10',
            ],
            [
                'id' => 6,
                'user_id' => 5,
                'sale_id' => 1,
                'created_at' => '2020-11-15 18:15:10',
            ],
            [
                'id' => 7,
                'user_id' => 5,
                'sale_id' => 2,
                'created_at' => '2020-11-19 18:15:10',
            ],
            [
                'id' => 8,
                'user_id' => 5,
                'sale_id' => 3,
                'created_at' => '2020-11-21 18:15:10',
            ],
        ];
        foreach($data as $d){
            ExpertRecord::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expert_records');
    }
}
