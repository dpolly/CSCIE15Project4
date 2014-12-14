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
     * Displays the plant menu
     *
     * return       view plant_index
     */
    public function getIndex()
    {
        return View::make('plant_index');
    }

    /*
     * Displays the add plant view
     *
     * return       view plant_add
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
     * Process the add plant view
     *
     * return       view plant_index
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

    public function getSearch($id)
    {
        $plants = Plant::search($id);
        return View::make('plant_search')
            ->with('plants', $plants);
    }

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
