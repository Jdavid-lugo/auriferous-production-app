<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadoFundicionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resultado_fundicion', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('codigo');
			$table->integer('product_id');
			$table->string('cantidad');
			$table->integer('peso_bruto');
			$table->string('peso_fino');
			$table->dateTime('ley_analitica');
			$table->dateTime('ley_recuperable');
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
		Schema::dropIfExists('resultado_fundicion');
	}

}
