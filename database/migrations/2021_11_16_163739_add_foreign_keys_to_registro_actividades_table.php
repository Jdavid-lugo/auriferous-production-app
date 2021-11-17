<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegistroActividadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('registro_actividades', function(Blueprint $table)
		{
			$table->foreign('user_id', 'registro_actividades_user_id_fkey')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('registro_actividades', function(Blueprint $table)
		{
			$table->dropForeign('registro_actividades_user_id_fkey');
		});
	}

}
