<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreadoPorEliminadoPorLoteArenas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lote_arena', function (Blueprint $table) {
            $table->integer('deleted_by_user')->nullable();
            $table->integer('created_by_user')->nullable();
            $table->dropColumn('users_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lote_arena', function (Blueprint $table) {
            $table->dropColumn('created_by_user');
            $table->dropColumn('deleted_by_user');
        });
    }
}
