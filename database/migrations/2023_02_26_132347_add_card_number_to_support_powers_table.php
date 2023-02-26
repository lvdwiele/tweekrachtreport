<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('support_powers', function (Blueprint $table) {
            $table->unsignedFloat('card_number')->nullable();
        });

        DB::statement('
            update support_powers
            join core_powers on core_powers.power = support_powers.power
            set support_powers.card_number = core_powers.card_number        
        ');
    }

    public function down()
    {
        Schema::table('support_powers', function (Blueprint $table) {
            $table->dropColumn('card_number');
        });
    }
};