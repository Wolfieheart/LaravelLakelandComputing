<?php

namespace App\Models;

use Eloquent;
use DB;

class Category extends Eloquent{

    protected $fillable = array('name');

    public static $rules = array('name' => 'required|min:3');

    //One Category has MANY Products Relationship (See Product.php)
    public function products(){
        return $this->hasMany('Product');
    }

}
?>