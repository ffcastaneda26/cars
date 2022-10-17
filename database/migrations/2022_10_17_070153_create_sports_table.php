<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('spanish',25)->unique();
            $table->string('short_spanish',8)->unique();
            $table->string('english',25)->unique();
            $table->string('short_english',8)->unique();
            $table->boolean('individual')->nullable()->defaut(0)->comment('Individual?');
            $table->string('logotipo',191)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sports');
    }
}
