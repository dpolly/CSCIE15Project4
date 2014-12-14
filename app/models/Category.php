<?php
/**
 * 12-13-2014 DMP: Created
 * 12-13-2014 DMP: Added method(s):plant, getCategoryName
 */

class Category extends Eloquent
{

    /*
    * Relationship method for "many to many" relationship categories belongs to plants
    */

    public function plants ()
    {
        return $this->belongsToMany('Plant');
    }

    /*
     * Provides a list of categories from the categories table
     *
     * returns      an array of category names
     */
    public static function getCategoryName()
    {
        $list= Array();
        $collection = Category::all();

        foreach($collection as $category)
        {
            $list[$category->id] = $category->name;
        }

        return $list;
    }

}