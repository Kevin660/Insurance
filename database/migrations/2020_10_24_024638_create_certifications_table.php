<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use \App\Certification;
class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('type_id');
            $table->string('ref');
            $table->timestamp('verified_at')->nullable(); # 證照認證
            $table->timestamps();
        });

        # init_data
        $data = [
            [
                'user_id' => 1,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'user_id' => 1,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'user_id' => 1,
                'type_id' => 5,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'user_id' => 1,
                'type_id' => 6,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'user_id' => 2,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'user_id' => 2,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'user_id' => 2,
                'type_id' => 3,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'user_id' => 3,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'user_id' => 3,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
        ];
        foreach ($data as $d){
            Certification::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certifications');
    }
}
