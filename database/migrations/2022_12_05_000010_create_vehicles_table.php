<?php

use App\Models\Make;
use App\Models\Style;
use App\Models\Modell;
use App\Models\Location;
use App\Models\Material;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('stock',20)->nullable()->default(null)->comment('Id Stock Control');
            $table->foreignIdFor(Make::class)->comment('Marca');
            $table->unsignedBigInteger('model_id')->comment('Modelo');
            $table->foreignIdFor(Style::class)->comment('Estilo');
            $table->year('model_year',)->nullable()->default(null)->index()->comment('Año');
            $table->float('price', 9, 2)->nullable()->default(null)->default(null)->comment('Precio');
            $table->boolean('available')->default(1)->comment('Disponible?');
            $table->boolean('show')->default(1)->comment('Mostrarlo?');
            $table->boolean('premium')->default(0)->comment('¿Premium o destacado?');
            $table->text('description')->nullable()->default(null)->comment('Descripción');
            $table->timestamps();
            // Llave foranea que no se pudo asignar con modelo
            $table->foreign('model_id')->references('id')->on('models');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
