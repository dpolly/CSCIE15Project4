<?php
/*
 * 12-13-2014 DMP: Created
 * 12-13-2014 DMP: Added method(s):getIndex, getCreate
 * 12-14-2014 DMP: Added method(s):postCreate, getSearch, postSearch
 */

class PlantController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Displays the plant database search bar
     *
     * return       the view plant_index
     */
    public function getIndex()
    {
        return View::make('plant_index');
    }

    /*
     * Displays the add plant record view
     *
     * return       the view plant_add
     */
    public function getCreate()
    {
        $families = Family::getFamilyName();
        $categories = Category::getCategoryName();

        return View::make('plant_add')
            ->with('families', $families)
            ->with('categories', $categories);
    }

    /*
     * Process addition of plant record
     *
     * return       the view plant_index
     */
    public function postCreate()
    {
        $plant = new Plant();
        $plant->fill(Input::except('categories'));
        $plant->save();

        foreach (Input::get('categories') as $category)
        {
            $plant->categories()->save(Category::find($category));
        }
        return Redirect::action('PlantController@getIndex');
    }

    /*
     * Process deletion of plant record
     *
     * return   the view plant_index
     */
    public function postDelete()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $plant = Plant::findOrFail(Input::get('id'));
        Plant::destroy(Input::get('id'));

        return View::make('plant_index');
    }

    /*
     * Displays the edit plant record view
     *
     * returns      the plant_edit view
     */
    public function getEdit($id)
    {
        $families = Family::getFamilyName();
        $plants = Plant::with('categories')->findOrFail($id);
        $categories = Category::getCategoryName();

        return View::make('plant_edit')
            ->with('plant', $plants)
            ->with('family', $families)
            ->with('category', $categories);
    }

    /*
     * Process update of plant record
     *
     * return       the plant_index view
     */
    public function postEdit()
    {
        $plant = Plant::with('categories')->findOrFail(Input::get('id'));
        $plant->fill(Input::except('categories'));
        $plant->save();

        return View::make('plant_index');
    }

    /*
     * Displays the search results for single record after end user clicks on record
     *
     * return       the plant_search view
     */
    public function getSearch($id)
    {
        $plants = Plant::search($id);
        return View::make('plant_search')
            ->with('plants', $plants);
    }

    /*
     * Process search request returning results of all matching records
     *
     * returns      the plant_search_results view
     */
    public function postSearch()
    {
        $query  = Input::get('query');
        $plants = Plant::search($query);
        $families = Family::getFamilyName();

        return View::make('plant_search_results')
            ->with('plants', $plants)
            ->with('families', $families)
            ->with('query', $query);

    }

}
