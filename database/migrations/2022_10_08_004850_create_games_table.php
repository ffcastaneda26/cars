<?php

use App\Models\Round;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Round::class)->default(1)->comment('Round ');
            $table->timestamp('date')->nullable()->comment('Fecha');
            $table->foreignId('local_team_id')->constrained('teams')->comment('Local');
            $table->tinyInteger('local_score')->nullable()->default(null)->comment('Goles Local');
            $table->foreignId('visit_team_id')->constrained('teams')->comment('Visita');
            $table->tinyInteger('visit_score')->nullable()->default(null)->comment('Goles Local');
            $table->boolean('request_score')->nullable()->default(null)->comment('Pedir marcador en partidos');
            $table->tinyInteger('result')->nullable()->default(null)->comment('Resultado');
            $table->tinyInteger('points_winner')->nullable()->default(null)->comment('Puntos Ganador');
            $table->tinyInteger('extra_points_winner')->nullable()->default(null)->comment('Puntos Extra al ganador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
