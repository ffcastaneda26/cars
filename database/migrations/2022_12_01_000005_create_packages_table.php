<?php

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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->comment('Nombre del paquete');
            $table->float('price', 9, 2)->default('99.99')->comment('Precio');
            $table->tinyInteger('max_show_vehicles_per_location',)->nullable()->default(10)->comment('Máximo de vehículos a mostrar por localidad');
            $table->string('photo_rotation',10)->nullable()->default('Daily')->comment('Frecuencia para poder cambiar fotos');
            $table->tinyInteger('phone_number_listing_per_location')->nullable()->default(1)->comment('Máximo de teléfonos a mostrar de una localidad');
            $table->boolean('company_web_site_listing')->nullable()->default(1)->comment('Listar en campaña website');
            $table->tinyInteger('locations_allowed')->nullable()->default(1)->comment('Sucursales permitidas');
            $table->boolean('self_service_photo_upload')->nullable()->default(1)->comment('Subir fotos por si mismo');
            $table->enum('team_cuervo_photo_upload',['Bimonthly','Monthly'])->nullable()->default(null)->comment('Frecuencia de subir fotos por cuervo');
            $table->boolean('tag_higlights')->nullable()->default(0)->comment('Etiquetas');
            $table->tinyInteger('max_tags_higlights',)->nullable()->default(0)->comment('Máximo de etiquetas');
            $table->tinyInteger('premium_tag_search',)->nullable()->default(0)->comment('Búsquedas de búsquedas x etiquetas');
            $table->boolean('add_to_favorites',)->nullable()->default(0)->comment('Agregar vehículos a favoritos');
            $table->boolean('notify_add_to_favorites',)->nullable()->default(0)->comment('Notificar agregados a favoritos');
            $table->boolean('access_interested_users',)->nullable()->default(0)->comment('Acceso a usuarios intersados');
            $table->boolean('inventory_integratgion',)->nullable()->default(0)->comment('Integrar inventario IDMS');
            $table->float('price_additional_location', 9, 2)->nullable()->default('10.00')->comment('Precio por localidad adicional');
            $table->tinyInteger('vehicle_listing_bonus',)->nullable()->default(0)->comment('Cantidad de vehículos adicionales poe cuota extra');
            $table->tinyInteger('max_photos_by_vehicle',)->nullable()->default(10)->comment('Máximo de fotos por vehículo');
            $table->tinyInteger('max_photos_by_location',)->nullable()->default(40)->comment('Máximo de fotos por sucursal');
            $table->boolean('search_by_tags',)->nullable()->default(0)->comment('Buscar x Etiquetas');
            $table->boolean('show_prices',)->nullable()->default(0)->comment('Mostrar precios');
            $table->boolean('show_locations',)->nullable()->default(0)->comment('Mostrar sucursales');
            $table->boolean('count_clicks_in_vehicle',)->nullable()->default(0)->comment('Contar clics ver vehículo');
            $table->boolean('count_time_see_vehicle',)->nullable()->default(0)->comment('Contar tiempo viendo un vehículo');
            $table->boolean('count_photos_see',)->nullable()->default(0)->comment('Contar fotos vistas');
            $table->boolean('use_order_to_search',)->nullable()->default(0)->comment('Usa orden para buscar y presentar primero?');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
