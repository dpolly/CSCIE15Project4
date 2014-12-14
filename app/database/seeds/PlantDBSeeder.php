<?php
/**
 * 12-13-2014 DMP: Created
 */

class PlantDBSeeder extends Seeder
{

    public function run()
    {
        /*
        * Clear existing DB Entries
        */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE families');
        DB::statement('TRUNCATE categories');
        DB::statement('TRUNCATE plants');
        DB::statement('TRUNCATE category_plant');

        /*
         * Seed Family Table
         */
        $tomatoFamily = new Family;
        $tomatoFamily->botanical_name = 'Solanaceae';
        $tomatoFamily->save();

        $cukeFamily = new Family;
        $cukeFamily->botanical_name = 'Cucurbitaceae';
        $cukeFamily->save();

        $carrotFamily = new Family;
        $carrotFamily->botanical_name = 'Apiaceae';
        $carrotFamily->save();

        /*
         * Seed Category Table
         */
        $Annual=new Category;
        $Annual->name='Annual';
        $Annual->save();

        $Biennial=new Category;
        $Biennial->name='Biennial';
        $Biennial->save();

        $Perennial=new Category;
        $Perennial->name='Perennial';
        $Perennial->save();

        $fruit=new Category;
        $fruit->name='Fruit';
        $fruit->save();

        $vegetable=new Category();
        $vegetable->name='Vegetable';
        $vegetable->save();

        $ornamental=new Category();
        $ornamental->name='Ornamental';
        $ornamental->save();

        $native=new Category();
        $native->name='Native';
        $native->save();

        $import=new Category();
        $import->name='Import';
        $import->save();
        
        /*
         * Seed Plant Table
         */

        $tomatoplant = new Plant();
        $tomatoplant->botanical_name = 'Solanum lycopersicum';
        $tomatoplant->common_name = 'Tomato';
        $tomatoplant->family_id=$tomatoFamily->id;
        $tomatoplant->save();
        $tomatoplant->categories()->attach($Annual);
        $tomatoplant->categories()->attach($fruit);
        $tomatoplant->categories()->attach($native);

        $cukeplant = new Plant();
        $cukeplant->botanical_name = 'Cucumis sativus';
        $cukeplant->common_name = 'Cucumber';
        $cukeplant->family_id='2';
        $cukeplant->save();
        $cukeplant->categories()->attach($Annual);
        $cukeplant->categories()->attach($fruit);
        $cukeplant->categories()->attach($import);

        $carrotplant = new Plant();
        $carrotplant->botanical_name = 'Daucus carota ';
        $carrotplant->common_name = 'Carrot';
        $carrotplant->family_id='3';
        $carrotplant->save();
        $carrotplant->categories()->attach($Biennial);
        $carrotplant->categories()->attach($vegetable);

        $potatoplant = new Plant();
        $potatoplant->botanical_name = 'Solanum tuberosum';
        $potatoplant->common_name = 'Potato';
        $potatoplant->family()->associate($tomatoFamily);
        $potatoplant->save();
        $potatoplant->categories()->attach($Annual);
        $potatoplant->categories()->attach($vegetable);

    }
}