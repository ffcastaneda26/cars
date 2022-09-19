<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdgeRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edge_ranges', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('edge_from')->unique()->comment('Desde');
            $table->tinyInteger('edge_to')->unique()->comment('Hasta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edge_ranges');
    }
}
