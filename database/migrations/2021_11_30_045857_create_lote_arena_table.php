<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteArenaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lote_arena', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('molino_id');
			$table->string('codigo', 191);
			$table->integer('status');
			$table->decimal('toneladas_humedad', 8, 8);
			$table->decimal('toneladas_seca', 8, 8);
			$table->string('responsable', 191);
			$table->integer('users_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lote_arena');
	}

}
