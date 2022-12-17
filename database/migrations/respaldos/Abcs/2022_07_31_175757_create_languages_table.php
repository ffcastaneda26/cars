<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('spanish',20)->unique()->comment('Nombre en epsañol');
            $table->string('english',20)->unique()->comment('Nombre en Ingles');
            $table->string('code',2)->unique()->comment('Código');
            $table->string('image_path', 2048)->nullable()->default(null)->comment('Imagen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
