<?php

class PostsController extends BaseController{

	public function index()
	{
		if(Auth::check()){
			$auth_user_id = Auth::user()->id;

			$posts = Post::with(array('user', 'follows' => function($query) use ($auth_user_id){
			    $query->where('user_id', '=', $auth_user_id);
			 }))->where('flagged', '=', 'false')->paginate(25);

		}
		else{
			$posts = Post::with('user')->paginate(25);
		}
		return View::make('index', compact('posts'));
	}

	public function newPosts()
	{
		if(Auth::check()){
			$auth_user_id = Auth::user()->id;

			$posts = Post::with(array('user', 'follows' => function($query) use ($auth_user_id){
			    $query->where('user_id', '=', $auth_user_id);
			 }))->orderBy('created_at', 'desc')->paginate(25);
		}
		else{
			$posts = Post::with('user')->paginate(25);
		}
		return View::make('new', compact('posts'));
	}

	public function show($id)
	{
		$post = Post::findOrFail($id);
		return View::make('show', compact('post'));
	}
	
	public function create()
	{
		return View::make('newPost');
	}

	public function process()
	{
		$input = Input::all();

		$validator = Validator::make($input,
		    array(
		    	'url' => 'required',
		        'title' => 'required',
		        'desc' => 'required',
		        'captcha' => 'required|captcha'
		    )
		);

		if ($validator->fails())
		{
		    return Redirect::back()->withInput()->withErrors($validator);
		}
		else{
			$post = Post::create([
				'title' => $input['title'],
				'description' =>  $input['desc'],
				'url' => $input['url'],
				'thumbnail_url' => $input['img'],
				'video_ID' => $input['videoID'],
				'video_AutherID' => $input['videoAuthor'],
				'user_id' => Auth::user()->id,
				'category_id' => "1",
				'nsfw' => $input['nsfw'],
				'gore'=> $input['gore']
				]);

		return $post; 
		}
	}
}