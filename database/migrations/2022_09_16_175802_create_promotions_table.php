<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('spanish',100)->unique()->comment('Nombre Español');
            $table->string('english',100)->unique()->comment('Nombre Inglés');
            $table->timestamp('begin_at')->nullable()->comment('Fecha en que inicia');
            $table->timestamp('expire_at')->nullable()->comment('Fecha en que expira');
            $table->tinyInteger('days_expire_gifts')->nullable()->default(1)->comment('Días que espiran regalos');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
