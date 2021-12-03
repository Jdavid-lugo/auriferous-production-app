<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCombustibleAsignadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('combustible_asignado', function(Blueprint $table)
		{
			$table->foreign('unidad_id', 'combustible_asignado_unidad_id_fkey')->references('id')->on('unidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_responsable_id', 'combustible_asignado_user_responsable_id_fkey1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_id', 'combustible_asignado_product_id_fkey')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('combustible_asignado', function(Blueprint $table)
		{
			$table->dropForeign('combustible_asignado_unidad_id_fkey');
			$table->dropForeign('combustible_asignado_user_responsable_id_fkey1');
			$table->dropForeign('combustible_asignado_product_id_fkey');
		});
	}

}
