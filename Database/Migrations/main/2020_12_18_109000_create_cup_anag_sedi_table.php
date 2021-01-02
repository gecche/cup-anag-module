<?php

use Gecche\Breeze\Facades\Schema;
use Gecche\Breeze\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupAnagSediTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cup_anag_sedi', function (Blueprint $table) {

            $table->increments('id');// int(11) NOT NULL,

            $table->integer('organizzazione_id')->unsigned();// varchar(4) DEFAULT NULL,
            $table->foreign('organizzazione_id')->references('id')->on('cup_anag_anagrafiche')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('codice');
            $table->string('nome_it');
            $table->boolean('indirizzo_anagrafica')->default(true);// varchar(4) DEFAULT NULL,
            $table->boolean('principale')->default(false);// varchar(4) DEFAULT NULL,

            $table->string('indirizzo')->nullable()->default(null);
            $table->string('cap',5)->nullable()->default(null);
            $table->integer('comune_id')->unsigned()->index()->nullable()->default(null);// varchar(4) DEFAULT NULL,
            $table->foreign('comune_id')->references('id')->on('cup_geo_comuni')
                ->onDelete('restrict')->onUpdate('cascade');

            $table->string('localita')->nullable()->default(null);
            $table->string('numero_civico')->nullable()->default(null);
            $table->string('persona_contatto')->nullable()->default(null);
            $table->text('note')->nullable()->default(null);

            $table->index(['organizzazione_id','codice'],'cup_anag_sed_1');

            $table->nullableOwnerships();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cup_anag_sedi');
    }

}
