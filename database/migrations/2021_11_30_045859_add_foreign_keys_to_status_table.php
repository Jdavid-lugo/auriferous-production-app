<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('status', function(Blueprint $table)
		{
			$table->foreign('id_seccion', 'status_id_seccion_fkey')->references('id')->on('seccion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('status', function(Blueprint $table)
		{
			$table->dropForeign('status_id_seccion_fkey');
		});
	}

}
