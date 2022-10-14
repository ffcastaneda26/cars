<?php

use App\Models\ProcessCodeCompany;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes_company', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProcessCodeCompany::class)->comment('Proceso Generación Código');
            $table->string('code',8)->unique()->comment('Código');
            $table->foreignIdFor(Competidor::class)->nullable()->default(null)->comment('Competidor');
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
        Schema::dropIfExists('codes_company');
    }
}
