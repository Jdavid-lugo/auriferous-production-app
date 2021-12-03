<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sold_products', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('sale_id');
			$table->bigInteger('product_id');
			$table->integer('qty');
			$table->decimal('price', 10);
			$table->decimal('total_amount', 10);
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sold_products');
	}

}
