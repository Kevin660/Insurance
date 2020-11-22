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
                'id' => 1,
                'user_id' => 1,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'type_id' => 5,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'type_id' => 6,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 5,
                'user_id' => 2,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 6,
                'user_id' => 2,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 7,
                'user_id' => 2,
                'type_id' => 3,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 8,
                'user_id' => 3,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 9,
                'user_id' => 3,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 10,
                'user_id' => 6,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 11,
                'user_id' => 6,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 12,
                'user_id' => 7,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 13,
                'user_id' => 7,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 14,
                'user_id' => 7,
                'type_id' => 5,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 15,
                'user_id' => 7,
                'type_id' => 6,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 16,
                'user_id' => 8,
                'type_id' => 1,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 17,
                'user_id' => 8,
                'type_id' => 2,
                'ref' => '',
                'verified_at' => '2020-11-01',
            ],
            [
                'id' => 18,
                'user_id' => 8,
                'type_id' => 3,
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
