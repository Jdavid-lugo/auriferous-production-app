<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductsAnalisisLabTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products_analisis_lab', function(Blueprint $table)
		{
			$table->foreign('unidad_id', 'products_analisis_lab_unidad_id_fkey')->references('id')->on('unidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_id', 'products_analisis_lab_product_id_fkey')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('analisis_lab_id', 'products_analisis_lab_analisis_lab_id_fkey')->references('id')->on('analisis_laboratorio')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products_analisis_lab', function(Blueprint $table)
		{
			$table->dropForeign('products_analisis_lab_unidad_id_fkey');
			$table->dropForeign('products_analisis_lab_product_id_fkey');
			$table->dropForeign('products_analisis_lab_analisis_lab_id_fkey');
		});
	}

}
