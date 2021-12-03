<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociacionMaquinariaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('negociacion_maquinaria', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('alquiler');
			$table->string('combustible', 191);
			$table->string('lote_arena_id', 191);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('negociacion_maquinaria');
	}

}
