<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketBalanzaMolinoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_balanza_molino', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('lote_arena_id');
			$table->decimal('peso_cargado', 8, 8);
			$table->decimal('peso_vacio', 8, 8);
			$table->decimal('peso_total', 8, 8);
			$table->date('fecha_peso');
			$table->string('vehiculo_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_balanza_molino');
	}

}
