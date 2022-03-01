<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecibidoProcesadoSolicitudDeleteAnalisisArenas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analisis_arenas', function (Blueprint $table) {
            $table->integer('created_by_user')->nullable();
            $table->integer('accepted_by_user')->nullable();
            $table->integer('processed_by_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analisis_arenas', function (Blueprint $table) {
            $table->dropColumn('created_by_user');
            $table->dropColumn('accepted_by_user');
            $table->dropColumn('processed_by_user');
        });
    }
}
