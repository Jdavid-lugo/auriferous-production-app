<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->char('document_type', 1)->default('V');
			$table->integer('document_id')->unique();
			$table->string('name', 191);
			$table->string('email', 191)->nullable();
			$table->string('phone', 191)->nullable();
			$table->dateTime('last_purchase')->nullable();
			$table->integer('total_purchases')->default(0);
			$table->decimal('total_paid')->default(0);
			$table->timestamps(10);
			$table->softDeletes();
			$table->decimal('balance')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
