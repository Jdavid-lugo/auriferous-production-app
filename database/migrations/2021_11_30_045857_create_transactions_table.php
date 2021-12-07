<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('type', 191);
			$table->string('title', 191);
			$table->string('reference', 191)->nullable();
			$table->bigInteger('client_id')->nullable();
			$table->bigInteger('sale_id')->nullable();
			$table->bigInteger('provider_id')->nullable();
			$table->bigInteger('transfer_id')->nullable();
			$table->bigInteger('payment_method_id');
			$table->decimal('amount', 10);
			$table->bigInteger('user_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}
