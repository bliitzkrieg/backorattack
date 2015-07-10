<?php

class UsersController extends BaseController{
	
	public function create(){
		$input = Input::all();

		$validator = Validator::make($input,
		    array(
		        'username' => 'required|unique:users,username',
		        'password' => 'required',
		        'email' => 'required|unique:users,email',
		        'captcha' => 'required|captcha'
		    )
		);

		if ($validator->fails())
		{
		    return Redirect::back()->withInput()->withErrors($validator);
		}
		else{
			$user = User::create([
				'username' => $input['username'],
				'password' =>  $input['username'],
				'email' => $input['email']
				]);

			Auth::login($user);

			return Redirect::intended('/')->with('flash_message', 'Registration Succesful. You are logged in');
		}
	}

	public function settings(){
		return View::make('settings');
	}
	public function delete(){
		$input = Input::all();

		$validator = Validator::make($input,
		    array(
		        'captcha' => 'required|captcha'
		    )
		);
		if ($validator->fails())
		{
		    return Redirect::back()->withErrors($validator);
		}
		else{
			$user = User::find(Auth::user()->id);
			$user->delete();
			return Redirect::intended('/')->with('flash_message', 'Account successfully deleted.');
		}
	}

	public function changePass(){
		$input = Input::all();

		$validator = Validator::make($input,
		    array(
		        'pass' => 'required',
		        'rePass' => 'required|same:pass'
		    )
		);
		if ($validator->fails())
		{
		    return Redirect::back()->withErrors($validator);
		}
		else{

			$user = User::find(Auth::user()->id);

			$user->update(array('password' => $input['pass']));

			return Redirect::intended('/settings')->with('flash_message', 'Password Successfully changed.');
		}
	}
}