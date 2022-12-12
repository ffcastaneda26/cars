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
            $table->string('vin',17)->nullable()->comment('Número VIN');
            $table->smallInteger('vehicle_id',)->nullable()->comment('Id Vehículo');
            $table->string('make',50)->nullable()->comment('Marca');
            $table->string('model',50)->nullable()->comment('Modelo');
            $table->year('model_year',)->nullable()->comment('Año');
            $table->string('product_type',50)->nullable()->comment('Tipo producto');
            $table->string('body',50)->nullable()->comment('Body');
            $table->string('series',50)->nullable()->comment('Series');
            $table->string('drive',50)->nullable()->comment('Tracción');
            $table->smallInteger('engine_displacement',)->nullable()->comment('Motor');
            $table->smallInteger('engine_power_kw',)->nullable()->comment('Potencia motor (kw)');
            $table->smallInteger('engine_power_hp',)->nullable()->comment('Potencia motor(hp)');
            $table->string('fuel_type_primary',25)->nullable()->comment('Combustible primario');
            $table->string('transmission',25)->nullable()->comment('Transmisión');
            $table->tinyInteger('number_of_gears',)->nullable()->comment('Número de engranes');
            $table->string('manufacturer',50)->nullable()->comment('Fabricante');
            $table->string('manufacturer_address',80)->nullable()->comment('Dirección fabricante');
            $table->string('plant_city',50)->nullable()->comment('Ciudad de la planta');
            $table->string('plant_company',50)->nullable()->comment('Planta compañía');
            $table->string('plant_country',25)->nullable()->comment('Papis de la planta');
            $table->year('production_stopped',)->nullable()->comment('Terminó producción');
            $table->float('engine_compression_ratio',4,2)->nullable()->comment('Relación comprensión del motor');
            $table->smallInteger('engine_cylinder_bore_mm',)->nullable()->comment('Diámetro cilindro motor mm');
            $table->tinyInteger('engine_cylinders',)->nullable()->comment('Cilindros');
            $table->string('engine_cylinders_position',20)->nullable()->comment('Posición cilindros motor');
            $table->string('engine_position',40)->nullable()->comment('Posición del motor');
            $table->smallInteger('engine_rpm',)->nullable()->comment('RPM del motor');
            $table->smallInteger('engine_stroke_m',)->nullable()->comment('Carrera del motor mm');
            $table->smallInteger('engine_torque_rpm',)->nullable()->comment('Par motor (RPM)');
            $table->string('engine_turbine',40)->nullable()->comment('Turbina de motor');
            $table->string('valve_train',30)->nullable()->comment('Tren de váulvulas');
            $table->tinyInteger('fuel_capacity',)->nullable()->comment('Capacidad combustible');
            $table->float('fuel_consumption_combined',4,2)->nullable()->comment('Consumo  combinado');
            $table->float('fuel_consumption_extra_Urba',4,2)->nullable()->comment('Comsubo extra urbano');
            $table->float('fuel_consumption_Urban',4,2)->nullable()->comment('Consumo urbano');
            $table->string('fuel_system',50)->nullable()->comment('Sistema de combustible');
            $table->tinyInteger('valves_per_cylinder',)->nullable()->comment('Válvulas x Cilindro');
            $table->tinyInteger('number_of_doors',)->nullable()->comment('Puertas');
            $table->tinyInteger('number_of_seat_rows',)->nullable()->comment('Filas de asientos');
            $table->string('number_of_seats',)->nullable()->comment('Asientos');
            $table->string('front_brakes',50)->nullable()->comment('Freno delantero');
            $table->string('rear_brakes',20)->nullable()->comment('Frenos Traseros');
            $table->string('steeering',50)->nullable()->comment('Dirección');
            $table->string('steering_tyype',50)->nullable()->comment('Tipo de dirección');
            $table->string('rear_suspension',50)->nullable()->comment('Suspensión trasera');
            $table->string('front_suspension',50)->nullable()->comment('Suspensión delantera');
            $table->float('drag_coefficient',4,2)->nullable()->comment('Coeficiente de Arrastre');
            $table->string('wheel_rims_size',20)->nullable()->comment('Tamaño de llantas');
            $table->string('wheel_rims_size_array',)->nullable()->comment('Tamaño matriz tamaño de llantas');
            $table->string('wheel_size',20)->nullable()->comment('Tamaño de la rueda');
            $table->string('wheel_size_array',)->nullable()->comment('Tamaño matriz de ruedas');
            $table->smallInteger('wheelbase',)->nullable()->comment('Distancia entre ejes mm');
            $table->string('wheel_base_array',)->nullable()->comment('Matriz distancia ejes');
            $table->smallInteger('height',)->nullable()->comment('Alto mm');
            $table->smallInteger('lenght',)->nullable()->comment('Largo');
            $table->smallInteger('width',)->nullable()->comment('Ancho mm');
            $table->smallInteger('width_including mirrors',)->nullable()->comment('Ancho con espejos mm');
            $table->smallInteger('track_front',)->nullable()->comment('Frente de vía');
            $table->smallInteger('track_rear',)->nullable()->comment('Vía trasera');
            $table->float('acceleration',4,2)->nullable()->comment('Aceleracion 0-100');
            $table->smallInteger('max_speed',)->nullable()->comment('Velocidad máxima');
            $table->float('minimum_turning_circle',4,2)->nullable()->comment('Círculo de giro mínimo mts');
            $table->smallInteger('minimum_trunk_capacity',)->nullable()->comment('Capacidad mínima maletero');
            $table->smallInteger('weight_empty_kg',)->nullable()->comment('Peso vacío');
            $table->boolean('abs',)->nullable()->comment('¿Abs?');
            $table->string('check_digit',)->nullable()->comment('Digito verificador');
            $table->unsignedInteger('sequential_number',)->nullable()->comment('Número de secuencia');
            $table->string('trim',20)->nullable()->comment('Trim');
            $table->string('fuel_type_secondary',20)->nullable()->comment('Combustible secundario');
            $table->string('engine_model',80)->nullable()->comment('Modelo motor');
            $table->string('transmission_full',50)->nullable()->comment('Transmisión completa');
            $table->string('plant_state',30)->nullable()->comment('Estado de la planta');
            $table->string('market',10)->nullable()->comment('Mercado');
            $table->date('made_date',)->nullable()->comment('Fecha fabricación');
            $table->year('production_started')->nullable()->comment('Inicio Producción');
            $table->unsignedBigInteger('interior_color_id')->nullable()->unsigned()->comment('Color Interior');
            $table->unsignedBigInteger('exterior_color_id')->nullable()->unsigned()->comment('Color Interior');
            $table->float('price', 9, 2)->nullable()->default(null)->comment('Precio');
            $table->unsignedBigInteger('miles')->default(0)->comment('Millas');
            $table->boolean('available')->default(1)->comment('Disponible?');
            $table->boolean('show')->default(1)->comment('Mostrarlo?');
            $table->text('description')->nullable()->default(null)->comment('Descripción');
            $table->string('slug',200)->nullable()->default(null)->comment('Slug');
            $table->smallInteger('average_co2_emmision',)->nullable()->comment('Promedio emisión CO2');
            $table->tinyInteger('number_of_axies',)->nullable()->comment('número de ejes');
            $table->string('power_steering',)->nullable()->comment('Poder de dirección');
            $table->smallInteger('max_weight_kg',)->nullable()->comment('peso máximo kg');
            $table->smallInteger('permitted_trailer_load_whithout_brakes_kg',)->nullable()->comment('Carga permitida sin remolque KG');

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
