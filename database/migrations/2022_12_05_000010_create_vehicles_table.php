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
            $table->string('vin',17)->comment('Número VIN');
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
            $table->string('steering_tyype')->nullable()->comment('Tipo de dirección');
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
            $table->string('engine_compression_ratio')->nullable()->comment('Relación comprensión del motor');
            $table->string('engine_cylinder_bore_mm')->nullable()->comment('Diámetro cilindro motor mm');
            $table->string('engine_cylinders_position')->nullable()->comment('Posición cilindros motor');
            $table->string('engine_position')->nullable()->comment('Posición del motor');
            $table->string('engine_rpm')->nullable()->comment('RPM del motor');
            $table->string('engine_stroke_mm)')->nullable()->comment('Carrera del motor mm');
            $table->string('engine_torque_rpm')->nullable()->comment('Par motor (RPM)');
            $table->string('engine_turbine')->nullable()->comment('Turbina de motor');
            $table->string('valve_train')->nullable()->comment('Tren de váulvulas');
            $table->string('fuel_capacity')->nullable()->comment('Capacidad combustible');
            $table->string('fuel_consumption_combined')->nullable()->comment('Consumo  combinado');
            $table->string('fuel_consumption_extra_Urban)')->nullable()->comment('Comsubo extra urbano');
            $table->string('fuel_consumption_Urban')->nullable()->comment('Consumo urbano');
            $table->string('fuel_system')->nullable()->comment('Sistema de combustible');
            $table->string('valves_per_cylinder')->nullable()->comment('Válvulas x Cilindro');
            $table->string('front_brakes')->nullable()->comment('Freno delantero');
            $table->string('rear_brakes')->nullable()->comment('Frenos Traseros');
            $table->string('rear_suspension')->nullable()->comment('Suspensión trasera');
            $table->string('front_suspension')->nullable()->comment('Suspensión delantera');
            $table->string('drag_coefficient')->nullable()->comment('Coeficiente de Arrastre');
            $table->string('wheel_rims_size')->nullable()->comment('Tamaño de llantas');
            $table->string('wheel_rims Size_array')->nullable()->comment('Tamaño matriz tamaño de llantas');
            $table->string('wheel_size')->nullable()->comment('Tamaño de la rueda');
            $table->string('wheel_size_array')->nullable()->comment('Tamaño matriz de ruedas');
            $table->string('wheelbase')->nullable()->comment('Distancia entre ejes mm');
            $table->string('height')->nullable()->comment('Alto mm');
            $table->string('width')->nullable()->comment('Ancho mm');
            $table->string('width_including mirrors')->nullable()->comment('Ancho con espejos mm');
            $table->string('track_front')->nullable()->comment('Frente de vía');
            $table->string('track_rear')->nullable()->comment('Vía trasera');
            $table->string('acceleration')->nullable()->comment('Aceleracion 0-100');
            $table->string('max_speed')->nullable()->comment('Velocidad máxima');
            $table->string('minimum_turning_circle')->nullable('Círculo de giro mínimo mts')->comment();
            $table->string('minimum_trunk_capacity')->nullable('Capacidad mínima maletero')->comment();
            $table->string('weight_empty_kg')->nullable()->comment('Peso vacío');
            $table->string('abs')->nullable()->comment('¿Abs?');
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
