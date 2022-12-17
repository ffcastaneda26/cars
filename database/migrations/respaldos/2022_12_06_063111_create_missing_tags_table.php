<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing_tags', function (Blueprint $table) {
            $table->id();
            $table->string('api_tag',100)->comment('Etiqueta que devuelve la API');
            $table->string('value_tag',50)->comment('Atributo en la tabla vehiculos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missing_tags');
    }
};
