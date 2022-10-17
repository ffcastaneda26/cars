<?php

use App\Models\Tournament;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->comment('Usuario');
            $table->foreignIdFor(Tournament::class)->comment('Torneo ');
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
        Schema::dropIfExists('user_tournaments');
    }
}
