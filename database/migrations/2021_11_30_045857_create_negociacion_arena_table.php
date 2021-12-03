<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociacionArenaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('negociacion_arena', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('lote_arena_id');
			$table->string('porcentaje_recuperacion', 191);
			$table->string('porcentaje_acuerdo', 191);
			$table->integer('tenor');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('negociacion_arena');
	}

}
