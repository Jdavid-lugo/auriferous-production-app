<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSoldProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sold_products', function(Blueprint $table)
		{
			$table->foreign('sale_id', 'sold_products_sale_id_fkey')->references('id')->on('sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_id', 'sold_products_product_id_fkey')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sold_products', function(Blueprint $table)
		{
			$table->dropForeign('sold_products_sale_id_fkey');
			$table->dropForeign('sold_products_product_id_fkey');
		});
	}

}
