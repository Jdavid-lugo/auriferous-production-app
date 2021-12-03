<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnalisisArenasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('analisis_arenas', function(Blueprint $table)
		{
			$table->foreign('analisis_laboratorio_id', 'analisis_arenas_analisis_laboratorio_id_fkey')->references('id')->on('analisis_laboratorio')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('lote_arena_id', 'analisis_arenas_lote_arena_id_fkey')->references('id')->on('lote_arena')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('analisis_arenas', function(Blueprint $table)
		{
			$table->dropForeign('analisis_arenas_analisis_laboratorio_id_fkey');
			$table->dropForeign('analisis_arenas_lote_arena_id_fkey');
		});
	}

}
