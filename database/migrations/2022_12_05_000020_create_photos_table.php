<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->comment('Vehículo');
            $table->string('path',255)->unique()->comment('Ruta al archivo');
            $table->boolean('main')->default(0)->comment('¿Principal?');
            $table->bigIncrements('seen_times')->nullable()->default(0)->comment('Veces vista');
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
        Schema::dropIfExists('photos');
    }
}
