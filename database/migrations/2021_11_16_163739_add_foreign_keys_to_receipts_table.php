<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReceiptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('receipts', function(Blueprint $table)
		{
			$table->foreign('provider_id', 'receipts_provider_id_fkey')->references('id')->on('providers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'receipts_user_id_fkey')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('receipts', function(Blueprint $table)
		{
			$table->dropForeign('receipts_provider_id_fkey');
			$table->dropForeign('receipts_user_id_fkey');
		});
	}

}
