<?php
/**
 * 12-13-2014 DMP: Created
 * 12-13-2014 DMP: Added Method(s):family, categories
 * 12-14-2014 DMP: Added Method(s):search
 */

class Plant extends Eloquent
{

    protected $guarded = array('id', 'created_at', 'updated_at');

    /*
     * Relationship method for "one to many" relationship of family to plant (Inverse-plant belongs to author)
     */
    public function family()
    {
        return $this->belongsTo('Family');
    }

    /*
     * Relationship method for "many to many" relationship plants belongs to categories
     */
    public function categories () {

        return $this->belongsToMany('Category');
    }

    /*
     * Searches the plant database and returns all matching results
     */
    public static function search($query)
    {
        $plants=array();

        if($query)
        {
            $plants = Plant::with('categories','family')
                ->whereHas('family', function($q) use($query) {
                    $q->where('botanical_name', 'LIKE', "%$query%");
                })
                ->orWhereHas('categories', function($q) use($query) {
                    $q->where('name', 'LIKE', "%$query%");
                })
                ->orWhere('common_name', 'LIKE', "%$query%")
                ->orWhere('botanical_name', 'LIKE', "%$query%")
                ->orWhere('id', 'LIKE', "$query")
                ->get();
        }
        else
        {
             $plants = Plant::all();
        }
        return $plants;
    }
}