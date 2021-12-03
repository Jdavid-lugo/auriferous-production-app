<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisisArenasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('analisis_arenas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('lote_arena_id');
			$table->integer('analisis_laboratorio_id');
			$table->integer('muestreador_user_id');
			$table->integer('status_id');
			$table->dateTime('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('analisis_arenas');
	}

}
