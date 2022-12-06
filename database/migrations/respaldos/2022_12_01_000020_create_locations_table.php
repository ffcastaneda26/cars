<?php

use App\Models\Dealer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dealer::class)->comment('Distribuidor');
            $table->string('name',150)->unique()->comment('Nombre');
            $table->string('email',100)->unique()->comment('Correo electrónico');
            $table->string('website')->nullable()->default(null)->comment('Sitio Web');
            $table->unsignedBigInteger('zipcode')->nullable()->unsigned()->comment('Zona Postal');
            $table->string('address',100)->nullable()->comment('Dirección');
            $table->string('phone',10)->nullable()->comment('Teléfono');
            $table->string('logotipo')->nullable()->default(null)->comment('Logo');
            $table->float('latitude',15,11)->nullable()->default(0)->comment('Latitud');
            $table->float('longitude',15,11)->nullable()->default(0)->comment('Longitud');
            $table->point('position')->nullable()->default(null)->comment('Ubicación en un mapa');
            $table->json('complete_address')->nullable()->default(null)->comment('Dirección completa');
            $table->timestamp('expire_at')->nullable()->default(null)->comment('Fecha expira licencia');
            $table->boolean('active')->default(1)->comment('Activo?');
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
        Schema::dropIfExists('locations');
    }
};
