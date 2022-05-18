<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualDisplayNameOnCorePowersTable extends Migration
{
    public function up()
    {
        Schema::table('core_powers', function (Blueprint $table) {
            $table->string('display_name')->virtualAs('concat(type, \', \', power, \' (kaart: \', card_number, \')\')');
        });
    }

    public function down()
    {
        Schema::table('core_powers', function (Blueprint $table) {
            $table->dropColumn('display_name');
        });
    }
}
