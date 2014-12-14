<?php
/**
 * 12-13-2014 DMP: added up/drop for columns
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('plants', function($table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('family_id')->unsigned();
            $table->string('botanical_name');
            $table->string('common_name');
            $table->foreign('family_id')->references('id')->on('families');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('plants');
	}

}
