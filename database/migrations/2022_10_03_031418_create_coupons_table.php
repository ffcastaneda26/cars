<?php

use App\Models\Customer;
use App\Models\Gift;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->nullable()->default(null)->comment('Cliente');
            $table->foreignIdFor(Gift::class)->nullable()->default(null)->comment('Regalo');
            $table->timestamp('expire_at')->nullable()->comment('Fecha en que expira');
            $table->foreignIdFor(User::class)->nullable()->default(null)->comment('Usario cajero');
            $table->timestamp('used_at')->nullable()->comment('Fecha en que se cobró');
            $table->boolean('used')->nullable()->default(1)->comment('Usado?');
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
        Schema::dropIfExists('coupons');
    }
}
