<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\InsuranceItem;
class CreateInsuranceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        // init data
        $data = [
            [
                'id' => 1,
                'name' => '專業責任保險',
                'description' => '幫助您處理因專業責任的過失被第三人求償的風險。', 
            ],
            [
                'id' => 2,
                'name' => '資訊網路安全保險',
                'description' => '幫助您處理因駭客入侵、個資外洩所導致的損失。', 
            ],
            [
                'id' => 3,
                'name' => '電子設備綜合保險',
                'description' => '幫助您保障電子設備的安全。解決因意外事故所導致的毀損風險。', 
            ],
            [
                'id' => 4,
                'name' => '員工誠實保證保險                ',
                'description' => '保障企業因員工不誠實行為造成功財務損失的風險。', 
            ],
            [
                'id' => 5,
                'name' => '產品責任保險',
                'description' => '幫助您處理因產品瑕疵所導致的被求償風險。', 
            ],
            [
                'id' => 6,
                'name' => '專業責任保險(智慧財產權附加條款)',
                'description' => '幫助您處理非因故意而侵害第三人的智慧財產權所導致的被求償風險。', 
            ],
            [
                'id' => 7,
                'name' => '商業火災保險',
                'description' => '幫助您處理因火災、爆炸、閃電雷擊引起的火災所導致的損失。', 
            ],
            [
                'id' => 8,
                'name' => '鍋爐保險',
                'description' => '幫助您處理因鍋爐爆炸而造成的毀損滅失以及第三人的傷害或財物損失。', 
            ],
            [
                'id' => 9,
                'name' => '機械保險',
                'description' => '幫助您處理因機械的損壞而造成的毀損滅失。', 
            ],
            [
                'id' => 10,
                'name' => '公共意外責任險',
                'description' => '公司的營業場所或建築物因過失責任造成第三人傷害或財務毀損而受求償時，可將此風險移轉給保險公司。', 
            ],
        ];
        
        foreach($data as $d){
            InsuranceItem::create($d);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_items');
    }
}
