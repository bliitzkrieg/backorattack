<?php

class UserPostsController extends BaseController{

	public function showPosts($username)
	{
		$user = User::byUsername($username)->posts;
		return $user;
	}

	public function showPost($username, $id){

		$post = Post::find($id, $username);
		return View::make('show', compact('post'));
	}
}