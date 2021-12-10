<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampUniqueKeyToSeccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seccion', function (Blueprint $table) {
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->unique('nombre');
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
        Schema::table('seccion', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('update_at');
            $table->dropUnique('nombre');
            $table->dropSoftDeletes();
        });
    }
}
