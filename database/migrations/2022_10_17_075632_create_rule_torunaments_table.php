<?php

use App\Models\Rule;
use App\Models\Tournament;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleTorunamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_torunaments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Rule::class)->comment('Regla');
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
        Schema::dropIfExists('rule_torunaments');
    }
}
