<?php

use App\Models\Sport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sport::class)->comment('Deporte ');
            $table->string('name',100)->comment('Nombre');
            $table->boolean('allow_ties')->nullable()->default(1)->comment('¿Permite empates?');
            $table->boolean('require_all_picks')->nullable()->default(1)->comment('Requiere todos los marcadores');
            $table->integer('minutes_before_to_edit')->nullable()->default(5)->comment('Minutos antes inicio partido para pronosticos');
            $table->boolean('available_user_at_register')->nullable()->default(0)->comment('Habilitar usuario cuando se registre?');
            $table->boolean('create_picks_at_available')->nullable()->default(0)->comment('Crear pronósticos al habilitar');
            $table->string('logotipo',191)->nullable()->comment('Logotipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
