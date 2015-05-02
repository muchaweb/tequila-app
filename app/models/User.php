<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	* Validation rules for login form.
	*
	* @var array
	*/
	public static $rules_login = array(
		'nickname' 	=> 'required',
		'password' 	=> 'required|between:6,12|alpha_num',
	);

	/**
	* Validation rules for user registration form.
	*
	* @var array
	*/
	public static $rules = array(
		'name' 					=> 	'required|between:2,100',
		'lastname' 				=> 	'required|between:2,100',
		'password_confirmation'	=> 	'required|between:6,12|alpha_num',
		'email' 				=> 	'required|email',
		'nickname' 				=>	'required',
		'job' 					=>  'alpha_dash',
		'phone' 				=>  'required',
		'password' 				=> 	'required|between:6,12|alpha_num|confirmed',
		'group_permissions_id'	=> 	'required|not_in:0'
	);
	
	/**
	* Validation rules for user update form.
	*
	* @var array
	*/
	public static $rules_user= array(
		'name' 					=> 	'required|between:2,100',
		'lastname' 				=> 	'required|between:2,100',
		'email' 				=> 	'required|email',
		'nickname' 				=>	'required',
		'job' 					=>  'alpha_dash',
		'phone' 				=>  'required',
	);

	/**
	* Validation rules for reset password form.
	*
	* @var array
	*/
	public static $rules_reset_password = array(
		'password' 				=> 	'required|between:6,12|alpha_num|confirmed'
	);

	/**
	* Custom validation messages.
	*
	* @var array
	*/
	public static $messages = array(
		'required' 	=> 'Campo obligatorio',
		'alpha' 	=> 'Sólo debe contener letras',
		'unique' 	=> 'Ya existe este email',
		'alpha_num' => 'Sólo debe contener números y letras',
		'between' 	=> 'El password debe ser de entre :min y :max caracteres',
		'confirmed' => 'El password de confirmación no coincide',
		'email' 	=> 'Ingrese un email válido',
		'not_in'    => 'Seleccione un valor de la lista'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token', 'confirmation_code');


	
}
