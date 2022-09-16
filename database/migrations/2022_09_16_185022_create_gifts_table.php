<?php

use App\Models\Promotion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Promotion::class)->comment('Promoción');
            $table->string('spanish',100)->nullable()->comment('Nombre Español');
            $table->string('english',100)->nullable()->comment('Nombre Inglés');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifts');
    }
}
