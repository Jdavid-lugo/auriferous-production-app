<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transactions', function(Blueprint $table)
		{
			$table->foreign('client_id', 'transactions_client_id_fkey')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sale_id', 'transactions_sale_id_fkey')->references('id')->on('sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('provider_id', 'transactions_provider_id_fkey')->references('id')->on('providers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('payment_method_id', 'transactions_payment_method_id_fkey')->references('id')->on('payment_methods')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'transactions_user_id_fkey')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('transactions', function(Blueprint $table)
		{
			$table->dropForeign('transactions_client_id_fkey');
			$table->dropForeign('transactions_sale_id_fkey');
			$table->dropForeign('transactions_provider_id_fkey');
			$table->dropForeign('transactions_payment_method_id_fkey');
			$table->dropForeign('transactions_user_id_fkey');
		});
	}

}
