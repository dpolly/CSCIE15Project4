<?php
/*
 * DMP 12-06-2014: Created and added Route(s): test, master
 * DMP 12-13-2014: Added Route(s): plant,
 */

Route::get('/', function()
    {
        return View::make("master");
    }
);

Route::get('/plant/edit/{id}', 'PlantController@getEdit');
Route::post('/plant/edit', 'PlantController@postEdit');
Route::post('/plant/delete', 'PlantController@postDelete');
Route::get('/plant/create', 'PlantController@getCreate');
Route::post('/plant/create', 'PlantController@postCreate');
Route::get('/plant', 'PlantController@getIndex');
Route::get('/plant/{id}', 'PlantController@getSearch');
Route::post('/plant', 'PlantController@postSearch');


Route::get('/test', function()
{

});

/**
 * Validate Database Connectivity
 */
Route::get('mysql-test', function() {
    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    #echo Pre::render($results);
    var_dump($results);
});