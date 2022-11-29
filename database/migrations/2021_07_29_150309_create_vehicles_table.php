<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->foreignId('dealer_id')->constrained()->comment('Distribuidor');
            $table->foreignId('make_id')->constrained()->comment('Marca');
            $table->foreignId('modell_id')->constrained('models')->comment('Modelo');
            $table->foreignId('status_id')->constrained()->comment('Estado');
            $table->foreignId('style_id')->constrained()->comment('Estilo');
            $table->foreignId('color_exterior_id')->constrained('colors')->comment('Color Exterior');
            $table->foreignId('color_interior_id')->constrained('colors')->comment('Color Interior');
            $table->foreignId('transmission_id')->constrained()->comment('Transmisión');
            $table->foreignId('drivetrain_id')->constrained()->comment('Tracción');
            $table->foreignId('trim_id')->constrained()->comment('Tipo de Motor');
            $table->foreignId('fuel_id')->constrained()->comment('Combustible');
            $table->text('description')->comment('Descripción');
            $table->float('price', 9, 2)->default('0')->comment('Precio');
            $table->string('slug',200)->nullable()->comment('Slug');
            $table->unsignedBigInteger('miles')->default(0)->comment('Millas');
            $table->unsignedBigInteger('inventory')->default(0)->comment('Inventario');
            $table->boolean('available')->default(1)->comment('Disponible?');
            $table->boolean('show')->default(1)->comment('Mostrarlo?');
            $table->string('vin',17)->unique()->comment('Número VIN');
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
        Schema::dropIfExists('vehicles');
    }
}
