<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorePowerSupportPowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_powers_support_powers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('first_core_power_id');
            $table->unsignedBigInteger('second_core_power_id');
            $table->unsignedBigInteger('first_support_power_id')
                ->nullable();
            $table->unsignedBigInteger('second_support_power_id')
                ->nullable();
            $table->unsignedBigInteger('first_support_power_id_2')
                ->nullable();
            $table->unsignedBigInteger('second_support_power_id_2')
                ->nullable();
        });

        Schema::table('core_powers_support_powers', function (Blueprint $table) {
            $table->foreign('first_core_power_id')
                ->references('id')
                ->on('core_powers')
                ->cascadeOnDelete();

            $table->foreign('second_core_power_id')
                ->references('id')
                ->on('core_powers')
                ->cascadeOnDelete();

            $table->foreign('first_support_power_id')
                ->references('id')
                ->on('support_powers')
                ->cascadeOnDelete();

            $table->foreign('second_support_power_id')
                ->references('id')
                ->on('support_powers')
                ->cascadeOnDelete();

            $table->foreign('first_support_power_id_2')
                ->references('id')
                ->on('support_powers')
                ->cascadeOnDelete();

            $table->foreign('second_support_power_id_2')
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
        Schema::table('core_powers_support_powers', function (Blueprint $table) {
            $table->dropForeign('core_powers_support_powers_first_core_power_id_foreign');
            $table->dropForeign('core_powers_support_powers_second_core_power_id_foreign');
            $table->dropForeign('core_powers_support_powers_first_support_power_id_foreign');
            $table->dropForeign('core_powers_support_powers_second_support_power_id_foreign');
            $table->dropForeign('core_powers_support_powers_first_support_power_id_2_foreign');
            $table->dropForeign('core_powers_support_powers_second_support_power_id_2_foreign');
        });

        Schema::dropIfExists('core_powers_support_powers');
    }
}
