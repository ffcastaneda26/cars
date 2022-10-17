<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTieBreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tie_breaks', function (Blueprint $table) {
            $table->id();
            $table->string('spanish',100)->unique();
            $table->string('short_spanish',20)->unique();
            $table->string('english',100)->unique();
            $table->string('short_english',20)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tie_breaks');
    }
}
