<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMolinosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('molinos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 191);
			$table->string('rif', 191);
			$table->string('tlf', 191);
			$table->string('sector', 191);
			$table->index(['nombre','rif']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('molinos');
	}

}
