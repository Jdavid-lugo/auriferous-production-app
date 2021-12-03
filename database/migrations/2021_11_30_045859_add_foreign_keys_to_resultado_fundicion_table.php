<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResultadoFundicionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resultado_fundicion', function(Blueprint $table)
		{
			$table->foreign('product_id', 'resultado_fundicion_product_id_fkey')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('resultado_fundicion', function(Blueprint $table)
		{
			$table->dropForeign('resultado_fundicion_product_id_fkey');
		});
	}

}
