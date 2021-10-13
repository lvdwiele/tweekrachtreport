<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->default(null)
                ->nullable();
            $table->unsignedBigInteger('client_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign('reports_client_id_foreign');
            $table->dropForeign('reports_user_id_foreign');
        });

        Schema::dropIfExists('reports');
    }
}
