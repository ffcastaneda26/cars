<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competidors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',40)->comment('Nombre');
            $table->string('last_name',40)->nullable()->comment('Apellido');
            $table->string('email',100)->nullable()->default(null)->comment('Correo Electrónico');
            $table->string('phone',10)->comment('Teléfono');
            $table->string('address',100)->nullable()->default(null)->comment('Dirección');
            $table->unsignedInteger('zipcode')->nullable()->comment('Zona postal');
            $table->tinyInteger('age')->nullable()->default(null)->comment('edad en años');
            $table->date('birthday')->nullable()->default(null)->comment('Fecha nacimiento');
            $table->boolean('agree_be_rules')->comment('¿Acepta reglas?');
            $table->boolean('agree_be_legal_age')->comment('¿Acepta ser mayor de edad?');
            $table->timestamps();
            // Llave foránea
            $table->foreign('zipcode')->references('zipcode')->on('zipcodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competidors');
    }
}
