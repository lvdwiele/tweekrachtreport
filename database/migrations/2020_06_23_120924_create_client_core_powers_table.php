<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientCorePowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_core_powers', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('core_power_id');
        });

        Schema::table('client_core_powers', function (Blueprint $table) {
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->cascadeOnDelete();

            $table->foreign('core_power_id')
                ->references('id')
                ->on('core_powers')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_core_powers', function (Blueprint $table) {
            $table->dropForeign('client_core_powers_client_id_foreign');
            $table->dropForeign('client_core_powers_core_power_id_foreign');
        });

        Schema::dropIfExists('client_core_powers');
    }
}
