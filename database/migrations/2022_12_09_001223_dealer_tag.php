<?php

use App\Models\Dealer;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dealer::class)->comment('Distribuidor');
            $table->foreignIdFor(Tag::class)->comment('Etiqueta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealer_tag');

    }
};
