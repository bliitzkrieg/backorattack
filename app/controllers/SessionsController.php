<?php

class SessionsController extends BaseController{

	public function create(){
		return View::make('sessions.create');
	}

	public function store(){
		$input = Input::all();

		$attempt = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password']
			], true);
		if($attempt){
			if(Auth::user()->banned){
				Auth::logout();
				return Redirect::back()->with('flash_message', 'Account is disabled, please contact an admin.');
			}
			else{
				return Redirect::intended('/')->with('flash_message', 'You logged in succesfully');
			}
		}

		return Redirect::back()->with('flash_message', 'Invalid credentials')->withInput();
	}

	public function destroy(){
		Auth::logout();
		return Redirect::home()->with('flash_message', 'You logged out succesfully');
	}
}