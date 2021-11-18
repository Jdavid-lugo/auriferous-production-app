<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociacionAcarreoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('negociacion_acarreo', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('lote_arena_id');
			$table->string('combustible');
			$table->string('pago');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('negociacion_acarreo');
	}

}
