<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientSupportPowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_support_powers', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('support_power_id');
        });

        Schema::table('client_support_powers', function (Blueprint $table) {
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->cascadeOnDelete();

            $table->foreign('support_power_id')
                ->references('id')
                ->on('support_powers')
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
        Schema::table('client_support_powers', function (Blueprint $table) {
            $table->dropForeign('client_support_powers_client_id_foreign');
            $table->dropForeign('client_support_powers_support_power_id_foreign');
        });

        Schema::dropIfExists('client_support_powers');
    }
}
