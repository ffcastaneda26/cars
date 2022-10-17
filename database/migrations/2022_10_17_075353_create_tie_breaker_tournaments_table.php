<?php

use App\Models\TieBreak;
use App\Models\Tournament;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTieBreakerTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tie_breaker_tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TieBreak::class)->comment('Criterio Desempate ');
            $table->foreignIdFor(Tournament::class)->comment('Torneo ');
            $table->tinyInteger('order')->default(1)->comment('oRDEN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tie_breaker_tournaments');
    }
}
