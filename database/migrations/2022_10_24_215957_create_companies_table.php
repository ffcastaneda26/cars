<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->comment('Nombre empresa');
            $table->string('email',100)->nullable()->default(null)->comment('Correo Electrónico');
            $table->string('phone',10)->nullable()->default(null)->comment('Teléfono');
            $table->string('address',100)->nullable()->default(null)->comment('Dirección');
            $table->unsignedInteger('zipcode')->nullable()->comment('Zona postal');
            $table->decimal('longitude', 11, 8)->nullable()->comment('Longitud');
            $table->decimal('lattitude', 11,8)->nullable()->comment('Latitud');
            $table->string('logotipo',191)->nullable()->default(null)->comment('Logotipo');
            $table->boolean('active')->default(1)->comment('¿Activa?');
            $table->string('google_address')->comment('Dirección  regresada por google');
            $table->foreign('zipcode')->references('zipcode')->on('zipcodes');
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
        Schema::dropIfExists('companies');
    }
}
