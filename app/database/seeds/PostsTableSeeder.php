<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
		Post::truncate();
		
		Post::create([
			'title' => 'Test Post',
			'description' => 'This is a test post',
			'url' => 'http://www.youtube.com',
			'user_id' => '1',
			'analytic_id' => '1',
			'category_id' => '1'

		]);
		Post::create([
			'title' => 'Test Post 2',
			'description' => 'This is a test post 2',
			'url' => 'http://www.youtube.com',
			'user_id' => '1',
			'analytic_id' => '1',
			'category_id' => '1'
		]);
		Post::create([
			'title' => 'Test Post 3',
			'description' => 'This is a test post 3',
			'url' => 'http://www.youtube.com',
			'user_id' => '2',
			'analytic_id' => '1',
			'category_id' => '1'

		]);
				Post::create([
			'title' => 'Test Post 3',
			'description' => 'This is a test post 3',
			'url' => 'http://www.youtube.com',
			'user_id' => '2',
			'analytic_id' => '1',
			'category_id' => '1'

		]);
						Post::create([
			'title' => 'Test Post 3',
			'description' => 'This is a test post 3',
			'url' => 'http://www.youtube.com',
			'user_id' => '2',
			'analytic_id' => '1',
			'category_id' => '1'

		]);
								Post::create([
			'title' => 'Test Post 3',
			'description' => 'This is a test post 3',
			'url' => 'http://www.youtube.com',
			'user_id' => '2',
			'analytic_id' => '1',
			'category_id' => '1'

		]);
	}

}