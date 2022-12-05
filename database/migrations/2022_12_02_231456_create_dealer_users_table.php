<?php

use App\Models\Dealer;
use App\Models\User;
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
        Schema::create('dealer_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dealer::class)->comment('Distribuidor');
            $table->foreignIdFor(User::class)->comment('Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealer_user');
    }
};
