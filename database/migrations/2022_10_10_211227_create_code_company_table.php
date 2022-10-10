<?php

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_codes_company', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->comment('Empresa');
            $table->foreignIdFor(User::class)->comment('Usuario que creó');
            $table->integer('total_codes')->comment('Total de códigos');
            $table->boolean('printed')->default(0)->comment('¿Impreso?');
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
