<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLoteArenaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lote_arena', function(Blueprint $table)
		{
			$table->foreign('id', 'lote_arena_id_fkey')->references('id')->on('molinos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('status', 'lote_arena_status_fkey')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lote_arena', function(Blueprint $table)
		{
			$table->dropForeign('lote_arena_id_fkey');
			$table->dropForeign('lote_arena_status_fkey');
		});
	}

}
