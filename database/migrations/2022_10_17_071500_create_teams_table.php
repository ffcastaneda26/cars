<?php

use App\Models\Sport;
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
            $table->foreignIdFor(Sport::class)->comment('Deporte ');
            $table->string('name',50)->comment('Equipo');
            $table->string('alias',20)->nullable()->default(null)->comment('Alias');
            $table->string('short',6)->nullable()->default(null)->comment('Corto');
            $table->string('logotipo',191)->nullable()->default(null)->comment('Logotipo');
            $table->boolean('request_score')->nullable()->default(0)->comment('Pedir marcador en partidos');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?');
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
