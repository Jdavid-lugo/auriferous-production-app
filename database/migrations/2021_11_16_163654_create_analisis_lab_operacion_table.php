<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisisLabOperacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('analisis_lab_operacion', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('status_id');
			$table->integer('analisis_laboratorio_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('analisis_lab_operacion');
	}

}
