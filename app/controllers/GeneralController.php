<?php

class GeneralController extends BaseController{

	public function about()
	{
		return View::make('about');
	}
	public function contact(){
		$from = "contact";
		return View::make('contact', compact('from'));
	}

	public function support(){
		$from = "support";
		return View::make('contact', compact('from'));
	}

	public function request(){
		$from = "request";
		return View::make('contact', compact('from'));
	}

	public function idea(){
		$from = "idea";
		return View::make('contact', compact('from'));
	}

	public function hug(){
		$from = "hug";
		return View::make('contact', compact('from'));
	}

	public function valor(){
		return View::make('valor');
	}
}