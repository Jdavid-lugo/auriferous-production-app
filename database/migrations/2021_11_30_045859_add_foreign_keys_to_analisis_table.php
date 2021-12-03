<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnalisisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('analisis', function(Blueprint $table)
		{
			$table->foreign('tipo_analisis_id', 'analisis_tipo_analisis_id_fkey')->references('id')->on('tipo_analisis')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('valores_id', 'analisis_valores_id_fkey')->references('id')->on('valores_analisis')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('analisis', function(Blueprint $table)
		{
			$table->dropForeign('analisis_tipo_analisis_id_fkey');
			$table->dropForeign('analisis_valores_id_fkey');
		});
	}

}
