<?php

use App\Models\Competidor;
use App\Models\Game;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Competidor::class)->comment('Competidor');
            $table->foreignIdFor(Game::class)->comment('Juego');
            $table->tinyInteger('winner')->nullable()->default(0)->comment('Ganador: 1=Locao 2=Visita 0=Empate');
            $table->tinyInteger('local_score')->nullable()->default(0)->comment('Puntos Local');
            $table->tinyInteger('visit_score')->nullable()->default(0)->comment('Puntos Visita');
            $table->boolean('guess_game')->nullable()->default(0)->comment('¿Acertó juego?');
            $table->boolean('guess_local_score')->nullable()->default(0)->comment('¿Acertó marcador Local?');
            $table->boolean('guess_visit_score')->nullable()->default(0)->comment('¿Acertó marcador visita');
            $table->tinyInteger('dif_winner_score')->nullable()->default(0)->comment('Diferencia Score Ganador');
            $table->tinyInteger('dif_total_score')->nullable()->default(0)->comment('Diferencia Score Total');
            $table->tinyInteger('dif_local_score')->nullable()->default(0)->comment('Diferencia Score Local');
            $table->tinyInteger('dif_visit_score')->nullable()->default(0)->comment('Diferencia Score Visita');
            $table->boolean('guess_last_game')->nullable()->default(0)->comment('Acertó último partido?');
            $table->boolean('guess_local')->nullable()->default(0)->comment('Acertó local?');
            $table->boolean('guess_visit')->nullable()->default(0)->comment('Acertó Visita?');
            $table->tinyInteger('extra_poings')->nullable()->default(0)->comment('Puntos extra');
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
        Schema::dropIfExists('picks');
    }
}
