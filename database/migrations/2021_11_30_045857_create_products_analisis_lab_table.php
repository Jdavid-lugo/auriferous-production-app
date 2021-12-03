<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsAnalisisLabTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_analisis_lab', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('analisis_lab_id');
			$table->integer('product_id');
			$table->integer('cantidad');
			$table->integer('unidad_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_analisis_lab');
	}

}
