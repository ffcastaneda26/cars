<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpireAtCouponFieldToPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->enum('expiration_type',['days','date'])->default('days')->after('expire_at')->comment('Tipo Expira: Días o Fecha');
            $table->timestamp('expire_at_coupons')->nullable()->after('days_expire_gifts')->comment('Fecha en que expira');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropColumn('expire_at_coupons');
            $table->dropColumn('expiration_type');
        });
    }
}
