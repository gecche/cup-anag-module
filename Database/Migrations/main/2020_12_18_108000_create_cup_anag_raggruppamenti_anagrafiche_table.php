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
        Schema::create('cup_anag_raggruppamenti_anagrafiche', function (Blueprint $table) {

            $table->id();// int(11) NOT NULL,

            $table->unsignedBigInteger('anagrafica_id');// varchar(4) DEFAULT NULL,
            $table->foreign('anagrafica_id')->references('id')->on('cup_anag_anagrafiche')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tipologia_id');// varchar(4) DEFAULT NULL,
            $table->foreign('tipologia_id')->references('id')->on('cup_anag_tipologie_anagrafiche')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cup_anag_raggruppamenti_anagrafiche');
    }

};
