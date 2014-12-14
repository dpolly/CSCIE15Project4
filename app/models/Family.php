<?php
/**
 * 12-13-2014 DMP: Created
 * 12-13-2014 DMP: Added method(s):plant, getFamilyName
 */

class Family extends Eloquent
{

    /*
     * Relationship method for "one to many' relationship of family to plants
     */
    public function plant() {

        return $this->hasMany('Plant');
    }

    /*
     * Provides a list of families from the families table
     *
     * returns      an array of family botanical names
     */
    public static function getFamilyName()
    {
        $list= Array();
        $collection = Family::orderBy('id','ascending')->get();
        foreach($collection as $family)
        {
            $list[$family->id] = $family->botanical_name;
        }

        return $list;
    }

}