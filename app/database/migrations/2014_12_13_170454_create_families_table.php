<?php
/**
 * 12-13-2014 DMP: added up/drop for columns
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {

            Schema::create('families', function($table)
            {
                $table->increments('id');
                $table->timestamps();
                $table->string('botanical_name');
            });
     }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('families');
	}

}
