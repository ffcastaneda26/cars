<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makes', function (Blueprint $table) {
            $table->id();
            $table->string('name',200)->unique()->comment('Marca del vehículo');
            $table->string('image_path')->nullable()->default(null)->comment('Logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makes');
    }
}
