<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->unique()->comment('Nombre');
            $table->string('address',60)->nullable()->comment('Dirección');
            $table->string('phone',15)->nullable()->comment('Teléfono');
            $table->string('email',100)->unique()->comment('Correo electrónico');
            $table->string('website')->nullable()->default(null)->comment('Sitio Web');
            $table->unsignedBigInteger('zipcode')->nullable()->unsigned()->comment('Zona Postal');
            $table->timestamp('expire_at')->nullable()->default(null)->comment('Fecha expira licencia');
            $table->string('image_path')->nullable()->default(null)->comment('Logo');
            $table->float('latitude',15,11)->nullable()->default(0)->comment('Latitud');
            $table->float('longitude',15,11)->nullable()->default(0)->comment('Longitud');
            $table->point('position')->nullable()->default(null)->comment('Ubicación en un mapa');
            $table->boolean('active')->default(1)->comment('Activo?');
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
        Schema::dropIfExists('dealers');
    }
}
