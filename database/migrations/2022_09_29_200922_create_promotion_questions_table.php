<?php

use App\Models\Promotion;
use App\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_question', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Promotion::class)->comment('Promoción');
            $table->foreignIdFor(Question::class)->comment('Pregunta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_question');
    }
}
