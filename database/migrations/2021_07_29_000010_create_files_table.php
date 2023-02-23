<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->nullable()->default(null)->comment('Nombre Original del archivo');
            $table->string('file_path',255)->nullable()->comment('Url del archivo');
            $table->unsignedBigInteger('fileable_id')->comment('Id Modelo padre');
            $table->string('fileable_type',100)->comment('Modelo Padre');
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
        Schema::dropIfExists('files');
    }
}
