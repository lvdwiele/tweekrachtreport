<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualDisplayNameOnSupportPowersTable extends Migration
{
    public function up()
    {
        Schema::table('support_powers', function (Blueprint $table) {
            $table->string('display_name')->virtualAs('concat(type, \', \', power)');
        });
    }

    public function down()
    {
        Schema::table('support_powers', function (Blueprint $table) {
            $table->dropColumn('display_name');
        });
    }
}
