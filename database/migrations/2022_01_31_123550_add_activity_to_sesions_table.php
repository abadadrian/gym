<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActivityToSesionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sesions', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_id')->default(1);
            $table->foreign('activity_id')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //las fk se mombran así: tabla_columna_foreign
        //esto se usa para eliminar la clave en el down
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign('sesions_activity_id_foreign');
            $table->dropColumn('activity_id');
        });
    }
}
