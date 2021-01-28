<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->string('type')->comment('取引の種類');
            $table->string('municipality_code')->index()->comment('市区町村コード');
            $table->string('prefecture')->index()->comment('都道府県名');
            $table->string('municipality')->index()->comment('市区町村名');
            $table->string('district_name')->index()->comment('地区名');
            $table->string('area')->comment('面積');
            $table->string('trade_price')->nullable()->comment('総取引額');
            $table->string('unit_price')->comment('平米単価');
            $table->string('period')->index()->comment('取引時点');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
