<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNegociacionArenaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('negociacion_arena', function(Blueprint $table)
		{
			$table->foreign('lote_arena_id', 'negociacion_arena_lote_arena_id_fkey')->references('id')->on('lote_arena')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('negociacion_arena', function(Blueprint $table)
		{
			$table->dropForeign('negociacion_arena_lote_arena_id_fkey');
		});
	}

}
