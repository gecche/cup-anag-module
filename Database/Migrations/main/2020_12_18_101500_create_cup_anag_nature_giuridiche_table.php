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
		Schema::create('cup_anag_nature_giuridiche', function(Blueprint $table)
		{
		    $table->id();
            $table->string('codice')->unique();
            $table->string('nome_it');
            $table->boolean('soggetti_residenti')->default(1);

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
		Schema::drop('cup_anag_nature_giuridiche');
	}

};
