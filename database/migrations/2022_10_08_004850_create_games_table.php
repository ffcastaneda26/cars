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
            $table->tinyInteger('local_score')->nullable()->default(0)->comment('Goles Local');
            $table->foreignId('visit_team_id')->constrained('teams')->comment('Visita');
            $table->tinyInteger('visit_score')->nullable()->default(0)->comment('Goles Local');
            $table->tinyInteger('points_winner')->nullable()->default(1)->comment('Puntos Ganador');
            $table->tinyInteger('extra_points_winner')->nullable()->default(0)->comment('Puntos Extra al ganador');
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
