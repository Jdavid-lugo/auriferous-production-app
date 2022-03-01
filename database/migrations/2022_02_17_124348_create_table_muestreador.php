<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMuestreador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muestreador', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('user_id');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('user_id', 'muestreador_user')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('muestreador');
    }
}
