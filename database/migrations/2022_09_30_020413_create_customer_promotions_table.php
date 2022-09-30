<?php

use App\Models\Customer;
use App\Models\Promotion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_promotion', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->comment('Cliente');
            $table->foreignIdFor(Promotion::class)->comment('Promoción');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_promotion');
    }
}
