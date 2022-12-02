<?php

use App\Models\Dealer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dealer::class)->nullable()->default(null)->comment('Id Distribuidor');
            $table->string('vin',25)->nullable()->default(null)->comment('VIN');
            $table->string('stock',20)->nullable()->default(null)->comment('Id Stock');
            $table->year('year')->nullable()->default(null)->comment('Axo');
            $table->string('make',20)->nullable()->comment('Marca');
            $table->string('model',25)->nullable()->default(null)->comment('Modelo');
            $table->string('exterior_color',100)->nullable()->default(null)->comment('Color Exterior');
            $table->string('interior_color',100)->nullable()->default(null)->comment('Color Interior');
            $table->integer('mileage')->nullable()->default(0)->comment('millas');
            $table->string('transmission',40)->nullable()->default(null)->comment('Transmision');
            $table->string('engine',100)->nullable()->default(null)->comment('Motor');
            $table->integer('retail_price')->nullable()->default(0)->comment('Precio Oferta');
            $table->integer('sales_price')->nullable()->default(0)->comment('Precio Venta');
            $table->float('downpayment',10,2)->nullable()->default(0.00)->comment('Enganche');
            $table->string('options',2)->nullable()->default(null)->comment('OPciones');
            $table->mediumText('images')->nullable()->default(null)->comment('URL para la imagen principal');
            $table->dateTimeTz('last_updated', $precision = 0)->nullable()->default(now())->comment('Ultima actualizacion');
            $table->string('body',100)->nullable()->default(null)->comment('Body');
            $table->string('trim',100)->nullable()->default(null)->comment('Trim');
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
        Schema::dropIfExists('temporary_inventories');
    }
}
