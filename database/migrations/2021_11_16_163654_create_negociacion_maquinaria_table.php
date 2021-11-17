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
			$table->string('combustible');
			$table->string('lote_arena_id');
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
