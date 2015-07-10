<?php
	class Post extends Eloquent{

	    public static $unguarded = true;
		//protected $guarded = ['id'];
		public function user(){
			return $this->belongsTo('User');
		}

		public static function find($id, $username = null){
			$task = static::with('user')->find($id);

			if($username and $task->user->username !== $username)
				throw new Illuminate\Database\Eloquent\ModelNotFoundException;

			return $task;
		}

		public function follows() {
		    return $this->hasMany('Follow');
		}
	}