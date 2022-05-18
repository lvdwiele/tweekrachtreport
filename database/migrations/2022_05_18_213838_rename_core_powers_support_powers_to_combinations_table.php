<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCorePowersSupportPowersToCombinationsTable extends Migration
{
    public function up()
    {
        Schema::table('core_powers_support_powers', function (Blueprint $table) {
            $table->rename('combinations');
        });
    }

    public function down()
    {
        Schema::table('combinations', function (Blueprint $table) {
            $table->rename('core_powers_support_powers');
        });
    }
}
