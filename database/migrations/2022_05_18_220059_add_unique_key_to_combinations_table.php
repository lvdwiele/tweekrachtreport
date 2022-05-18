<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueKeyToCombinationsTable extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('combinations_temp', function (Blueprint $table) {
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

        Schema::table('combinations_temp', function (Blueprint $table) {
            $table->unique([
                'first_core_power_id',
                'second_core_power_id',
            ], 'unique_core_power_combination');

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

        $uniqueCombinations = DB::table('combinations')
            ->select([
                'first_core_power_id',
                'second_core_power_id',
                'first_support_power_id',
                'second_support_power_id',
                'first_support_power_id_2',
                'second_support_power_id_2',
            ])
            ->groupBy([
                'first_core_power_id',
                'second_core_power_id',
                'first_support_power_id',
                'second_support_power_id',
                'first_support_power_id_2',
                'second_support_power_id_2',
            ])
            ->get();

        $valuesToInsert = $uniqueCombinations->map(function ($a) {
            return json_decode(json_encode($a), true);
        });

        DB::table('combinations_temp')
            ->insert($valuesToInsert->toArray());

        Schema::dropIfExists('combinations');

        Schema::rename('combinations_temp', 'combinations');

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        //
    }
}
