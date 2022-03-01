<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeForeignKeyIdMolinos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lote_arena', function (Blueprint $table) {
            $table->dropForeign('lote_arena_id_fkey');
            $table->foreign('molino_id', 'lote_arena_id_fkey')->references('id')->on('molinos');
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
            $table->dropForeign('lote_arena_id_fkey');
        });
    }
}
