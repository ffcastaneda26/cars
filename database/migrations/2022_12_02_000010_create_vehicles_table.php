<?php

use App\Models\Location;
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

            // Datos importantes de la API
            $table->foreignIdFor(Location::class)->comment('Localidad');
            $table->string('vin',17)->unique()->comment('Número VIN');
            $table->string('make')->nullable()->comment('Marca');
            $table->string('model')->nullable()->comment('Modelo');
            $table->year('model_year')->nullable()->comment('Año');
            $table->string('product_type')->nullable()->comment('Tipo producto');
            $table->string('body')->nullable()->comment('Body');
            $table->string('trim')->nullable()->comment('Trim');
            $table->string('series')->nullable()->comment('Series');
            $table->string('drive')->nullable()->comment('Tracción');
            $table->tinyInteger('engine_cylinders')->nullable()->comment('Cilindros');
            $table->tinyInteger('number_of_doors')->nullable()->comment('Puertas');
            $table->tinyInteger('number_of_seat_rows')->nullable()->comment('Filas de asientos');
            $table->tinyInteger('number_of_seats')->nullable()->comment('Asientos');
            $table->string('steeering')->nullable()->comment('Dirección');
            $table->Integer('engine_displacement')->nullable()->comment('Motor');
            $table->Integer('engine_power_kw')->nullable()->comment('Potencia motor (kw)');
            $table->Integer('engine_power_hp')->nullable()->comment('Potencia motor(hp)');
            $table->string('fuel_type_primary')->nullable()->comment('Combustible primario');
            $table->string('fuel_type_secondary')->nullable()->comment('Combustible secundario');
            $table->string('engine_model')->nullable()->comment('Modelo motor');
            $table->string('transmission')->nullable()->comment('Transmisión');
            $table->string('transmission_full')->nullable()->comment('Transmisión completa');
            $table->Integer('number_of_gears')->nullable()->comment('Número de engranes');
            $table->string('manufacturer')->nullable()->comment('Fabricante');
            // Datos propios del distribuidor

            $table->text('description')->comment('Descripción');
            $table->float('price', 9, 2)->default('0')->comment('Precio');
            $table->string('slug',200)->nullable()->comment('Slug');
            $table->unsignedBigInteger('miles')->default(0)->comment('Millas');
            $table->boolean('available')->default(1)->comment('Disponible?');
            $table->boolean('show')->default(1)->comment('Mostrarlo?');

            // Datos complementarios de la API
            $table->bigInteger('vehicle_id')->nullable()->comment('Id Vehículo');
            $table->string('manufacturer_address')->nullable()->comment('Dirección fabricante');
            $table->string('plant_city')->nullable()->comment('Ciudad de la planta');
            $table->string('plant_company')->nullable()->comment('Planta compañía');
            $table->string('plant_country')->nullable()->comment('Papis de la planta');
            $table->string('pant_state')->nullable()->comment('Estado de la planta');
            $table->string('market')->nullable()->comment('Mercado');
            $table->Date('made_date')->nullable()->comment('Fecha fabricación');
            $table->year('production_started')->nullable()->comment('Inicio Producción');
            $table->year('production_stopped')->nullable()->comment('Terminó producción');
            $table->tinyInteger('check_digit')->nullable()->comment('Digito verificador');
            $table->bigInteger('sequential_number')->nullable()->comment('Número de secuencia');


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
