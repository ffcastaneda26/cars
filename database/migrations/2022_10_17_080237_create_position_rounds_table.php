<?php

use App\Models\Round;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Round::class)->comment('Jornada');
            $table->foreignIdFor(User::class)->comment('Usuario ');
            $table->integer('points')->nullable()->default(null)->comment('Puntos');
            $table->integer('position')->nullable()->default(null)->comment('Posición');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_rounds');
    }
}
