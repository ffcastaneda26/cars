<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledsTransmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transmissions', function (Blueprint $table) {
            if (!Schema::hasColumn('transmissions', 'english')) {
                $table->string('english',20)->unique()->comment('Inglés')->after('id');
            }
            if (!Schema::hasColumn('transmissions', 'spanish')) {
                $table->string('spanish',20)->unique()->comment('Español')->after('english');
            }

            if (Schema::hasColumn('transmissions', 'name')) {
                $table->dropColumn('name');
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
        Schema::table('transmissions', function (Blueprint $table) {
            if (Schema::hasColumn('transmissions', 'english')) {
                $table->dropColumn('english');
            }

            if (Schema::hasColumn('transmissions', 'spanish')) {
                $table->dropColumn('spanish');
            }
            
        });
    }
}
