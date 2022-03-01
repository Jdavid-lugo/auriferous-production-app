<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAnalistaId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analisis_laboratorio', function (Blueprint $table) {
            $table->integer('analista_id')->nullable();;
            $table->foreign('analista_id', 'analista_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analisis_laboratorio', function (Blueprint $table) {
            $table->dropForeign('analista_user');
            $table->dropColumn('analista_id');
        });
    }
}
