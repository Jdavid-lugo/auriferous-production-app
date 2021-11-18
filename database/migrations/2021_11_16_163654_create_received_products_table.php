<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('received_products', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('receipt_id');
			$table->bigInteger('product_id');
			$table->integer('stock');
			$table->integer('stock_defective');
			$table->timestamps(10);
			$table->foreign('product_id')->references('id')->on('products');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('received_products');
	}

}
