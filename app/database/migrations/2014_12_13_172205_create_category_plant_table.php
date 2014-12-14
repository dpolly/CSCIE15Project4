<?php
/**
 * 12-13-2014 DMP: added up/drop for columns
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPlantTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('category_plant', function($table) {

            $table->integer('plant_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('plant_id')->references('id')->on('plants');
            $table->foreign('category_id')->references('id')->on('categories');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		    Schema::drop('category_plant');
	}

}
