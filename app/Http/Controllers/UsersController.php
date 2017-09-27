<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
use Cart;

class UsersController extends Controller {

	//getNewaccount() - Upon hitting Create new Account
	//Bring the user to the NewAccount View
	public function getNewaccount() {
		return View::make('users.newaccount');
	}
	
    //validates all input from the User Registration Form
    //If Validation Passes, return to the root directory
    //Esle return them to form with Errors
	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->address = Input::get('address');
			$user->town = Input::get('town');
			$user->postcode = Input::get('postcode');
			$user->save();

			return Redirect::to('/');
		}

		return Redirect::to('users/newaccount')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function getSignin() {
		return View::make('users.signin');
	}

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('/')->with('message', 'Thanks for signing in');
		}

		return Redirect::to('users/signin')->with('message', 'Your email/password combo was incorrect');
	}

	public function getSignout() {
		Auth::logout();
		Cart::destroy();
		return Redirect::to('users/signin')->with('message', 'You have been signed out');
	}
}