<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatLngFieldsDealersTable extends Migration
{

    public function up()
    {
        Schema::table('dealers', function (Blueprint $table) {
            if (!Schema::hasColumn('dealers', 'latitude')) {
                $table->decimal('latitude',18,15)->nullable()->default(null)->comment('Latitud')->after('expire_at');
            }

            if (!Schema::hasColumn('dealers', 'longitude')) {
                $table->decimal('longitude',18,15)->nullable()->default(null)->comment('Longitud')->after('latitude');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealers', function (Blueprint $table) {
            if (Schema::hasColumn('dealers', 'latitude')) {
                $table->dropColumn('latitude');
            }

            if (Schema::hasColumn('dealers', 'longitude')) {
                $table->dropColumn('longitude');
            }

        });
    }

}
