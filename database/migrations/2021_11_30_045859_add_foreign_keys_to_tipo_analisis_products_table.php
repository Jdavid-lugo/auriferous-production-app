<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTipoAnalisisProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tipo_analisis_products', function(Blueprint $table)
		{
			$table->foreign('product_id', 'tipo_analisis_products_product_id_fkey')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tipo_analisis_id', 'tipo_analisis_products_tipo_analisis_id_fkey')->references('id')->on('tipo_analisis')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tipo_analisis_products', function(Blueprint $table)
		{
			$table->dropForeign('tipo_analisis_products_product_id_fkey');
			$table->dropForeign('tipo_analisis_products_tipo_analisis_id_fkey');
		});
	}

}
