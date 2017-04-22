<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('sensors', function(Blueprint $table){
            $table->increments('id');
            $table->string('cod');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('clients');
        });

        Schema::drop('sensor');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensors');
	}

}
