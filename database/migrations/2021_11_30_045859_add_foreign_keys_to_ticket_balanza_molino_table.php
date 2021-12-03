<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketBalanzaMolinoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ticket_balanza_molino', function(Blueprint $table)
		{
			$table->foreign('lote_arena_id', 'ticket_balanza_molino_lote_arena_id_fkey')->references('id')->on('lote_arena')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ticket_balanza_molino', function(Blueprint $table)
		{
			$table->dropForeign('ticket_balanza_molino_lote_arena_id_fkey');
		});
	}

}
