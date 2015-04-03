<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'nickname' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'username' => 'required|unique:users|max:255',
			'cellphone'	=> 'required|unique:users|min:11',
			'gender'	=> 'required',
			'is_tutor'  => 'required',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'nickname' => $data['nickname'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'username' => $data['username'],
			'cellphone' => $data['cellphone'],
			'gender' => $data['gender'],
			'is_tutor' => (bool) $data['is_tutor'],
		]);
	}

}
