<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->comment('Equipo');
            $table->string('alias',20)->nullable()->default(null)->comment('Alias');
            $table->string('short',6)->nullable()->default(null)->comment('Corto');
            $table->string('logotipo',191)->nullable()->default(null)->comment('Logotipo');
            $table->boolean('active')->default(1)->comment('¿Activo?');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
