<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $hidden = array('Password');

    //add to array
    protected $fillable = [ 'FirstName', 'LastName', 'Address', 'Town', 'Postcode', 'Email', 'Password', 'Admin'];

    public static $rules = array(
        'firstname'=>'required|min:2|alpha',
        'lastname'=>'required|min:2|alpha',
        'email'=>'required|email|unique:users',
        'password'=>'required|alpha_num|between:8,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:8,12',
        'admin'=>'boolean'
    );

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
      return $this->Password;
    }

    public function getReminderEmail()
    {
        return $this->Email;
    }
}
