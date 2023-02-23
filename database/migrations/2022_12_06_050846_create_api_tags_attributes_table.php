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
        Schema::create('api_tags_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('api_tag',100)->comment('Etiqueta que devuelve la API');
            $table->string('table_attribute',50)->comment('Atributo en la tabla vehiculos');
            $table->boolean('truncate')->nullable()->default(0)->comment('Truncar');
            $table->tinyInteger('length_truncate')->nullable()->comment('Largo a truncar');
            $table->boolean('is_array')->nullable()->default(0)->comment('Es array');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_tags_attributes');
    }
};
