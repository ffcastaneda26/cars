<?php

use App\Models\Make;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->string('name',80)->comment('Nombre');
            $table->string('phone',10)->comment('Telefono');
            $table->year('model_year',)->nullable()->default(null)->index()->comment('Año');
            $table->foreignIdFor(Make::class)->comment('Marca');
            $table->unsignedBigInteger('model_id')->comment('Modelo');
            $table->unsignedInteger('max_miles')->default(0)->comment('Millas');
            $table->unsignedInteger('downpayment')->nullable()->default(0)->comment('Enganche');
            $table->string('type_financing')->default('indifferent')->comment('Tipo de financiamiento');
            $table->mediumText('details')->nullable()->default(null)->comment('Detalles');
            $table->timestamps();
            // Llave foranea que no se pudo asignar con modelo
            $table->foreign('model_id')->references('id')->on('models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
