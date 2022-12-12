<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('social_network_id')->nullable()->comment('Id de la red Social');
            $table->unsignedBigInteger('socialable_id')->comment('Id propietario de la red social');
            $table->string('socialable_type')->comment('Propietario de la red social');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socialables');
    }
}
