<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth;
use View;


class CategoriesController extends Controller
{

	//GetIndex() - Returns all the categories to the Admin Panel
    public function getIndex() {
        $category = Category::all();
        return View::make('categories.index')
            ->with('categories', $category);
    }
	
	//PostCreate() - alidates all input from the categories admin panel
    //If Validation Passes, return admin to admin panel with the category created
    //Else return them to panel with Errors
    public function postCreate() {
        $validator = Validator::make(Input::all(), Category::$rules);
        if ($validator->passes()) {
            $category = new Category;
            $category->name = Input::get('name');
            $category->save();
            return Redirect::to('admin/categories/index')
                ->with('message', 'Category Created');
        }
        return Redirect::to('admin/categories/index')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }
	
	//PostDestroy() - Checks if a Category exists
    //If Found - Delete the Category and return to Admin Page
    //Elste Return to Panel listing Errors Occured
    public function postDestroy() {
        $category = Category::find(Input::get('id'));
        if ($category) {
            $category->delete();
            return Redirect::to('admin/categories/index')
                ->with('message', 'Category Deleted');
        }
        return Redirect::to('admin/categories/index')
            ->with('message', 'Something went wrong, please try again');
    }
}
