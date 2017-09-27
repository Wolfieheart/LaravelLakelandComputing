<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Image;

class ProductsController extends Controller
{

	//GetIndex() - Returns all the categories to the Admin Panel
    public function getIndex() {
        $products = Product::all();

        $categories = array();
        foreach(Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        return View::make('products.index')
            ->with('products', $products)
            ->with('categories', $categories);
    }
	
    //validates all input from the categories admin panel
    //If Validation Passes, return admin to admin panel
    //Esle return them to panel with Errors
    public function postCreate() {
        $validator = Validator::make(Input::all(), Product::$rules);
        if ($validator->passes()) {
            $product = new Product;
            $product->category_id = Input::get('category_id');
            $product->title = Input::get('title');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = 'img/products/' . $filename;
            Image::make($image->getRealPath())->resize(468, 249)->save($path);
            $product->image = 'img/products/'.$filename;
            $product->save();
            return Redirect::to('admin/products/index')
                ->with('message', 'Product Created');
        }
        return Redirect::to('admin/products/index')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }
	
    //Checks if a Category exists
    //If Found - Delete the Category and return to Admin Page
    //Elste Return to Panel listing Errors Occured
    public function postDestroy() {
        $product = Product::find(Input::get('id'));
        if ($product) {
            File::delete('public/'.$product->image);
            $product->delete();
            return Redirect::to('admin/products/index')
                ->with('message', 'Product Deleted');
        }
        return Redirect::to('admin/products/index')
            ->with('message', 'Something went wrong, please try again');
    }
	
    public function postToggleAvailability() {
        $product = Product::find(Input::get('id'));
        if ($product) {
            $product->availability = Input::get('availability');
            $product->save();
            return Redirect::to('admin/products/index')->with('message', 'Product Updated');
        }
        return Redirect::to('admin/products/index')->with('message', 'Invalid Product');
    }

}
