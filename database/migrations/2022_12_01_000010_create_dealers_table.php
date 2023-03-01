<?php

use App\Models\Package;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->unique()->comment('Nombre');
            $table->integer('zipcode')->nullable()->unsigned()->comment('Zona Postal');
            $table->boolean('active')->default(1)->comment('Activo?');
            $table->timestamps();
            // Llaves foráneas
			$table->foreign('zipcode')->references('zipcode')->on('zipcodes')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealers');
    }
}
