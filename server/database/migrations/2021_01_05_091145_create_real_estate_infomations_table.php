<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateInfomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_informations', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('取引の種類');
            $table->string('region')->comment('地区');
            $table->string('municipality_code')->comment('市区町村コード');
            $table->string('prefecture')->comment('都道府県名');
            $table->string('municipality')->comment('市区町村名');
            $table->string('district_name')->comment('地区名');
            $table->string('area')->comment('面積');
            $table->string('unit_price')->comment('取引価格');
            $table->string('period')->comment('取引時点');
            $table->string('price_per_unit')->nullable()->comment('坪単価');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estate_infomations');
    }
}
