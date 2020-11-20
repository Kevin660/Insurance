<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Type;
class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        // init_data
        $data = [
            [
                'id' => 1,
                'name' => '醫療險'
            ],
            [
                'id' => 2,
                'name'=> '健康險'
            ],
            [
                'id' => 3,
                'name' => '意外險'
            ],
            [
                'id' => 4,
                'name'=> '壽險'
            ],
            [
                'id' => 5,
                'name'=> '車險'
            ],
            [
                'id' => 6,
                'name'=> '企業保險'
            ],
            [
                'id' => 7,
                'name'=> '火險'
            ],
            [
                'id' => 8,
                'name'=> '水險'
            ],
            [
                'id' => 9,
                'name'=> '車禍'
            ],
            [
                'id' => 10,
                'name'=> '理賠'
            ],
            [
                'id' => 11,
                'name'=> '投保'
            ],
            [
                'id' => 12,
                'name'=> '失能'
            ],
        ];
        foreach($data as $d){
            Type::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
