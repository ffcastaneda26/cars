<?php

use App\Models\Customer;
use App\Models\Option;
use App\Models\Promotion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
             $table->foreignIdFor(Customer::class)->comment('Cliente');
            $table->foreignIdFor(Promotion::class)->comment('Promoción');
            $table->foreignIdFor(Option::class)->comment('Opción');
            $table->string('value',150)->nullable()->default(null)->comment('Valor de la Respuesta');
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
        Schema::dropIfExists('answers');
    }
}
