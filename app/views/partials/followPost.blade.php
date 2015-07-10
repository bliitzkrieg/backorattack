 <li class="list-group-item">
            <div class="row">
                <div class="col-xs-2 col-md-1">
                    <img height="70px" src="{{ $post->thumbnail_url }}"/>
                    	<div class='vote'>
                    		<!-- need better photos -->
		               	 	<a href="#"><img src="../img/shield.png" width="30px"/></a>
	               			<a href="#"><img class='pull-right' src="../img/sword.png" width="25px"/></a>
	               		</div>	
                </div>
                <div class="col-xs-10 col-md-11 post">
	                <div>
	                    {{ link_to($post->url, $post->title) }}
	                    <div class="mic-info">
	                        Posted {{ showTimeAgo($post->created_at) }} by
	                        {{ link_to("u/".$post->username, $post->username) }}
	                    </div>
	                    <div class="rating">
	                    	@if($post->nsfw == true)
	                    	<span class="warning">[NSFW]</span>
	                    	@endif
	                    	@if($post->gore == true)
	                    	<span class="warning">[Gore Warning]</span>
	                    	@endif
	                    </div>
	                </div>
	                <div class="action">
		                <button type="button" class="btn btn-xs btn-success favorite clicked" title="Follow" data-post="{{ $post->id }}" data-user="{{ Auth::user()->id }}">
		                    <span class="glyphicon glyphicon-star"></span>
		                </button>
		                <button type="button" class="btn btn-danger btn-xs pull-right flag" title="Flag" data-post="{{ $post->id }}" data-user="{{ Auth::user()->id }}">
		                    <span class="glyphicon glyphicon-flag"></span>
		                </button>

	                    <!-- link to category -->
	                    <a href="#" class="btn btn-info btn-xs" role="button">Funny</a>
	                </div>
                </div>
            </div>
        </li>