<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use \App\CertificationType;
class CreateCertificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_types', function (Blueprint $table) {
            $table->id();
            $table->integer("type")->comment("[0 => normal, 1 => required, 2 => advanced]");
            $table->string("name");
            $table->timestamps();
        });
         // init_data
        $data = [
            [
                'type' => 1,
                'name' => '人身保險業務員證照',
            ],
            [
                'type' => 1,
                'name' => '財產保險業務員證照',
            ],
            [
                'type' => 0,
                'name' => '投資型保險商品業務員證照',
            ],
            [
                'type' => 0,
                'name' => '外幣收付非投資型保險證照',
            ],
            [
                'type' => 2,
                'name' => '人身保險經紀人',
            ],
            [
                'type' => 2,
                'name' => '財產保險經紀人',
            ]
        ];

        foreach($data as $d){
            CertificationType::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certification_types');
    }
}
