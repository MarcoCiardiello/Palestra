<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheda', function (Blueprint $table) {
            $table->id('id_scheda');
            $table->unsignedBigInteger('id_personal_trainer');
            $table->unsignedBigInteger('id_atleta');
            $table->string('categoria');
            $table->string('nome_esercizio');
            $table->integer('ripetizione');
            $table->integer('volte');
            $table->double('calorie_perse');
            $table->timestamps();

            $table->foreign('id_personal_trainer')->references('id_personal_trainer')->on('personal_trainer');

            $table->foreign('id_atleta')->references('id_atleta')->on('atleta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheda');
    }
};
