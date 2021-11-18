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
			$table->string('nombre');
			$table->string('rif');
			$table->string('tlf');
			$table->string('sector');
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
		Schema::dropIfExists('molinos');
	}

}
