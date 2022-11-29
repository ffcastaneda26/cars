<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledsColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colors', function (Blueprint $table) {
            if (!Schema::hasColumn('colors', 'english')) {
                $table->string('english',20)->unique()->comment('Inglés')->after('id');
            }
            if (!Schema::hasColumn('colors', 'spanish')) {
                $table->string('spanish',20)->unique()->comment('Español')->after('english');
            }

            if (Schema::hasColumn('colors', 'name')) {
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
        Schema::table('colors', function (Blueprint $table) {
            if (Schema::hasColumn('colors', 'english')) {
                $table->dropColumn('english');
            }

            if (Schema::hasColumn('colors', 'spanish')) {
                $table->dropColumn('spanish');
            }

        });
    }
}
