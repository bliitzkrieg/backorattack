<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::truncate();
		
		User::create([
			'username' => 'Blitzkriegx',
			'password' => '1234',
			'email' => 'lucamatthewdecaprio@gmail.com'
		]);
		User::create([
			'username' => 'jbarron',
			'password' => '242',
			'email' => 'jasmineannebarron@gmail.com'
		]);
	}

}