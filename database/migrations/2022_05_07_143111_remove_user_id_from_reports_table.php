<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdFromReportsTable extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign('reports_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }

    public function down()
    {
        // cannot migrate back without backup
    }
}
