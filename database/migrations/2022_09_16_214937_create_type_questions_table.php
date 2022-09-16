<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_questions', function (Blueprint $table) {
            $table->id();
            $table->string('spanish',30)->unique()->comment('Nombre Español');
            $table->string('english',30)->unique()->comment('Nombre Inglés');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_questions');
    }
}
