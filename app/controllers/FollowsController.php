<?php

class FollowsController extends BaseController{

	//displays all posts the user is following
	public function show($username)
	{
		if(Auth::check()){
			$auth_user_id = Auth::user()->id;

			//grabs all data
			$posts = DB::table('follows')->join('posts', 'follows.post_id', '=', 'posts.id')
					->join('users', 'posts.user_id', '=', 'users.id')
					->where('follows.user_id', $auth_user_id)->get(array('follows.*','posts.*', 'users.username'));

					//NOTE***
					//Might want to consider paging!
			return View::make('follow', compact('posts'));
		}
		else{
			return "404";
		}
	}

	//function gets called by ajax to either follow or unfollow a post.
	public function follow()
	{
		//Checks if user is logged in
		if(Auth::check()){

			//checks if ajax request
		 	if (Request::ajax())
			{
				$post = Input::get('post');
				$user = Auth::user()->id;
				
				//checks if user is already following post
				$follow = DB::table('follows')->where('user_id', $user)->where('post_id', $post);

				//if row exists
				if($follow->count() > 0){
					//remove row
					$follow->delete();
				}
				else{
					//add new row
					Follow::create([
						'user_id' => $user,
						'post_id' => $post
					]);
				}
			}
			else{
				return "No Ajax Request";
			}
		}
		else{
			return "Not logged in";
		}
	}
}