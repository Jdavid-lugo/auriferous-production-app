<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisisLaboratorioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('analisis_laboratorio', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('fecha');
			$table->integer('analisis_id');
			$table->decimal('valor', 8, 8);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('analisis_laboratorio');
	}

}
