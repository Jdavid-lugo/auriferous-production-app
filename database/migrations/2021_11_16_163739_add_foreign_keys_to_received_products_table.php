<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReceivedProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('received_products', function(Blueprint $table)
		{
			$table->foreign('receipt_id', 'received_products_receipt_id_fkey')->references('id')->on('receipts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('received_products', function(Blueprint $table)
		{
			$table->dropForeign('received_products_receipt_id_fkey');
		});
	}

}
