<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombustibleAsignadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('combustible_asignado', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_responsable_id');
			$table->integer('product_id');
			$table->string('cantidad');
			$table->integer('unidad_id');
			$table->string('asignado_a');
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
		Schema::drop('combustible_asignado');
	}

}
