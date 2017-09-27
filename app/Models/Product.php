<?php
namespace App\Models;

use Eloquent;
use DB;

class Product extends Eloquent{
    protected $fillable = array('category_id', 'title', 'description', 'price', 'availability', 'image');

    public static $rules = array(
        'category_id' => 'required|integer',
        'title' => 'required|min:2',
        'description' => 'required|min:20',
        'price' => 'required|numeric',
        'availability' =>'integer',
        'image' => 'required|mimes:jpeg,jpg,bmp,png,gif'
    );

    //Product Belongs to ONE Category Relationship:
    public function category(){
        return $this->belongsTo('Category');
    }
}