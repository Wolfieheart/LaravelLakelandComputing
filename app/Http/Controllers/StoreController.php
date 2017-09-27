<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Cart;


class StoreController extends Controller {


	public function getIndex() {
		return View::make('store.index')
			->with('products', Product::take(4)->orderBy('created_at', 'DESC')->get());
	}

	public function getView($id) {
		return View::make('store.view')->with('product', Product::find($id));
	}

	public function getCategory($cat_id) {
		return View::make('store.category')
			->with('products', Product::where('category_id', '=', $cat_id)->paginate(6))
			->with('category', Category::find($cat_id));
	}

	public function getSearch() {
		$keyword = Input::get('keyword');

		return View::make('store.search')
			->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())
			->with('keyword', $keyword);
	}

	public function postAddtocart() {
		$product = Product::find(Input::get('id'));
		$quantity = Input::get('quantity');
		$cart = new Cart(new Session);
		Cart::insert(array(
			'id'=>$product->id,
			'name'=>$product->title,
			'price'=>$product->price,
			'quantity'=>$quantity,
			'image'=>$product->image
		));

		return Redirect::to('store/cart');
	}

	public function getCart() {
		return View::make('store.cart')->with('products', Cart::contents());
	}

	public function getRemoveitem($identifier) {
		$item = Cart::item($identifier);
		$item->remove();
		return Redirect::to('store/cart');
	}

	public function getContact() {
		return View::make('store.contact');
	}
}