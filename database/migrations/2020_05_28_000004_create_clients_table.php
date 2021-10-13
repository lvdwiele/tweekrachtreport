<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->unsignedBigInteger('company_id')
                ->nullable();
            $table->string('email')
                ->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address')
                ->nullable();
            $table->string('zip_code')
                ->nullable();
            $table->string('place')
                ->nullable();
            $table->string('phone_number')
                ->nullable();
            $table->timestamps();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
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
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign('clients_user_id_foreign');
            $table->dropForeign('clients_company_id_foreign');
        });

        Schema::dropIfExists('clients');
    }
}
