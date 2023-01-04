<?php

use App\Models\Status;
use App\Models\User;
use App\Models\Vehicle;
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
        Schema::create('user_vehicle', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->comment('Usuario');
            $table->foreignIdFor(Vehicle::class)->comment('Vehículo');
            $table->string('type',20)->nullable()->default('favorite')->comment('Tipo: favorite o contact');
            $table->foreignIdFor(Status::class)->nullable()->comment('Estado');
            $table->foreignId('user_updated_id')->nullable()->constrained('users')->comment('Usuario que actualizó');
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
        Schema::dropIfExists('user_vehicle');
    }
};
