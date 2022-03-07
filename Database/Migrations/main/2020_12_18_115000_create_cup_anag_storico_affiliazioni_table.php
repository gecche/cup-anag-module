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
        Schema::create('cup_anag_storico_affiliazioni', function (Blueprint $table) {

            $table->id();// int(11) NOT NULL,

            $table->unsignedBigInteger('organizzazione_id');// varchar(4) DEFAULT NULL,
            $table->foreign('organizzazione_id')->references('id')->on('cup_anag_anagrafiche')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('affiliata_id');// varchar(4) DEFAULT NULL,
            $table->foreign('affiliata_id')->references('id')->on('cup_anag_anagrafiche')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('sede_id');// varchar(4) DEFAULT NULL,
            $table->foreign('sede_id')->references('id')->on('cup_anag_sedi')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tipologia_id')->nullable();// varchar(4) DEFAULT NULL,
            $table->foreign('tipologia_id')->references('id')->on('cup_anag_tipologie_affiliazioni')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->date('inizio')->nullable();// varchar(4) DEFAULT NULL,
            $table->date('fine');// varchar(4) DEFAULT NULL,
            $table->text('note')->nullable()->default(null);
            //ALTRE INFO UTILI A UNA CERTA APP (JSON)
            $table->longText('app_info')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cup_anag_storico_affiliazioni');
    }

};
