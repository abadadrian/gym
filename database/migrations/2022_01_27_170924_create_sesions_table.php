<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesions', function (Blueprint $table) {
            $table->id();
            $table->string('diasSesion');
            $table->string('mesSesion');
            $table->dateTime('horaInicio');
            $table->dateTime('horaFinal');
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesions');

        //las fk se mombran así: tabla_columna_foreign
        //esto se usa para eliminar la clave en el down
        Schema::table('sesions', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');
        });
    }
}
