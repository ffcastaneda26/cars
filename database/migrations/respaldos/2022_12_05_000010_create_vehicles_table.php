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
            $table->foreignIdFor(Location::class)->comment('Sucursal');
            $table->string('vin',17)->nullable()->default(null)->comment('Número VIN');
            $table->smallInteger('vehicle_id',)->nullable()->default(null)->comment('Id Vehículo');
            $table->string('make',50)->nullable()->default(null)->index()->comment('Marca');
            $table->string('model',50)->nullable()->default(null)->index()->comment('Modelo');
            $table->year('model_year',)->nullable()->default(null)->index()->comment('Año');
            $table->string('product_type',50)->nullable()->default(null)->comment('Tipo producto');
            $table->string('body',100)->nullable()->default(null)->index()->comment('Body');
            $table->string('series',50)->nullable()->default(null)->comment('Series');
            $table->string('drive',50)->nullable()->default(null)->comment('Tracción');
            $table->smallInteger('engine_displacement',)->nullable()->default(null)->comment('Motor');
            $table->smallInteger('engine_power_kw',)->nullable()->default(null)->comment('Potencia motor (kw)');
            $table->smallInteger('engine_power_hp',)->nullable()->default(null)->comment('Potencia motor(hp)');
            $table->string('fuel_type_primary',25)->nullable()->default(null)->comment('Combustible primario');
            $table->string('transmission',50)->nullable()->default(null)->comment('Transmisión');
            $table->tinyInteger('number_of_gears',)->nullable()->default(null)->comment('Número de engranes');
            $table->string('manufacturer',50)->nullable()->default(null)->comment('Fabricante');
            $table->string('manufacturer_address',80)->nullable()->default(null)->comment('Dirección fabricante');
            $table->string('plant_city',50)->nullable()->default(null)->comment('Ciudad de la planta');
            $table->string('plant_company',50)->nullable()->default(null)->comment('Planta compañía');
            $table->string('plant_country',25)->nullable()->default(null)->comment('Papis de la planta');
            $table->year('production_stopped',)->nullable()->default(null)->comment('Terminó producción');
            $table->float('engine_compression_ratio',4,2)->nullable()->default(null)->comment('Relación comprensión del motor');
            $table->smallInteger('engine_cylinder_bore_mm',)->nullable()->default(null)->comment('Diámetro cilindro motor mm');
            $table->tinyInteger('engine_cylinders',)->nullable()->default(null)->comment('Cilindros');
            $table->string('engine_cylinders_position',20)->nullable()->default(null)->comment('Posición cilindros motor');
            $table->string('engine_position',40)->nullable()->default(null)->comment('Posición del motor');
            $table->smallInteger('engine_rpm',)->nullable()->default(null)->comment('RPM del motor');
            $table->smallInteger('engine_stroke_m',)->nullable()->default(null)->comment('Carrera del motor mm');
            $table->smallInteger('engine_torque_rpm',)->nullable()->default(null)->comment('Par motor (RPM)');
            $table->string('engine_turbine',40)->nullable()->default(null)->comment('Turbina de motor');
            $table->string('valve_train',30)->nullable()->default(null)->comment('Tren de váulvulas');
            $table->tinyInteger('fuel_capacity',)->nullable()->default(null)->comment('Capacidad combustible');
            $table->float('fuel_consumption_combined',4,2)->nullable()->default(null)->comment('Consumo  combinado');
            $table->float('fuel_consumption_extra_Urba',4,2)->nullable()->default(null)->comment('Comsubo extra urbano');
            $table->float('fuel_consumption_Urban',4,2)->nullable()->default(null)->comment('Consumo urbano');
            $table->string('fuel_system',50)->nullable()->default(null)->comment('Sistema de combustible');
            $table->tinyInteger('valves_per_cylinder',)->nullable()->default(null)->comment('Válvulas x Cilindro');
            $table->tinyInteger('number_of_doors',)->nullable()->default(null)->comment('Puertas');
            $table->tinyInteger('number_of_seat_rows',)->nullable()->default(null)->comment('Filas de asientos');
            $table->string('number_of_seats',)->nullable()->default(null)->comment('Asientos');
            $table->string('front_brakes',50)->nullable()->default(null)->comment('Freno delantero');
            $table->string('rear_brakes',20)->nullable()->default(null)->comment('Frenos Traseros');
            $table->string('steeering',50)->nullable()->default(null)->comment('Dirección');
            $table->string('steering_tyype',50)->nullable()->default(null)->comment('Tipo de dirección');
            $table->string('rear_suspension',50)->nullable()->default(null)->comment('Suspensión trasera');
            $table->string('front_suspension',50)->nullable()->default(null)->comment('Suspensión delantera');
            $table->float('drag_coefficient',4,2)->nullable()->default(null)->comment('Coeficiente de Arrastre');
            $table->string('wheel_rims_size',20)->nullable()->default(null)->comment('Tamaño de llantas');
            $table->string('wheel_rims_size_array',)->nullable()->default(null)->comment('Tamaño matriz tamaño de llantas');
            $table->string('wheel_size',20)->nullable()->default(null)->comment('Tamaño de la rueda');
            $table->string('wheel_size_array',)->nullable()->default(null)->comment('Tamaño matriz de ruedas');
            $table->smallInteger('wheelbase',)->nullable()->default(null)->comment('Distancia entre ejes mm');
            $table->string('wheel_base_array',)->nullable()->default(null)->comment('Matriz distancia ejes');
            $table->smallInteger('height',)->nullable()->default(null)->comment('Alto mm');
            $table->smallInteger('lenght',)->nullable()->default(null)->comment('Largo');
            $table->smallInteger('width',)->nullable()->default(null)->comment('Ancho mm');
            $table->smallInteger('width_including mirrors',)->nullable()->default(null)->comment('Ancho con espejos mm');
            $table->smallInteger('track_front',)->nullable()->default(null)->comment('Frente de vía');
            $table->smallInteger('track_rear',)->nullable()->default(null)->comment('Vía trasera');
            $table->float('acceleration',4,2)->nullable()->default(null)->comment('Aceleracion 0-100');
            $table->smallInteger('max_speed',)->nullable()->default(null)->comment('Velocidad máxima');
            $table->float('minimum_turning_circle',4,2)->nullable()->default(null)->comment('Círculo de giro mínimo mts');
            $table->smallInteger('minimum_trunk_capacity',)->nullable()->default(null)->comment('Capacidad mínima maletero');
            $table->smallInteger('weight_empty_kg',)->nullable()->default(null)->comment('Peso vacío');
            $table->boolean('abs',)->nullable()->default(null)->comment('¿Abs?');
            $table->string('check_digit',)->nullable()->default(null)->comment('Digito verificador');
            $table->unsignedInteger('sequential_number',)->nullable()->default(null)->comment('Número de secuencia');
            $table->string('trim',100)->nullable()->default(null)->comment('Trim');
            $table->string('fuel_type_secondary',20)->nullable()->default(null)->comment('Combustible secundario');
            $table->string('engine_model',80)->nullable()->default(null)->comment('Modelo motor');
            $table->string('transmission_full',50)->nullable()->default(null)->comment('Transmisión completa');
            $table->string('plant_state',30)->nullable()->default(null)->comment('Estado de la planta');
            $table->string('market',10)->nullable()->default(null)->comment('Mercado');
            $table->date('made_date',)->nullable()->default(null)->comment('Fecha fabricación');
            $table->year('production_started')->nullable()->default(null)->comment('Inicio Producción');
            $table->unsignedBigInteger('interior_color_id')->nullable()->default(null)->unsigned()->comment('Color Interior');
            $table->unsignedBigInteger('exterior_color_id')->nullable()->default(null)->unsigned()->comment('Color Interior');
            $table->float('price', 9, 2)->nullable()->default(null)->default(null)->comment('Precio');
            $table->unsignedBigInteger('miles')->default(0)->comment('Millas');
            $table->boolean('available')->default(1)->comment('Disponible?');
            $table->boolean('show')->default(1)->comment('Mostrarlo?');
            $table->boolean('premium')->default(0)->comment('¿Premium o destacado?');

            $table->text('description')->nullable()->default(null)->comment('Descripción');
            $table->string('slug',200)->nullable()->default(null)->comment('Slug');
            $table->smallInteger('average_co2_emmision',)->nullable()->default(null)->comment('Promedio emisión CO2');
            $table->tinyInteger('number_of_axies',)->nullable()->default(null)->comment('número de ejes');
            $table->string('power_steering',)->nullable()->default(null)->comment('Poder de dirección');
            $table->smallInteger('max_weight_kg',)->nullable()->default(null)->comment('peso máximo kg');
            $table->smallInteger('permitted_trailer_load_whithout_brakes_kg',)->nullable()->default(null)->comment('Carga permitida sin remolque KG');

            $table->timestamps();

            // Llaves foráneas
			$table->foreign('interior_color_id')->references('id')->on('colors');
			$table->foreign('exterior_color_id')->references('id')->on('colors');
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
