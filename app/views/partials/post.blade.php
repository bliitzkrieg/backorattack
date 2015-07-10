     <li id='feed' class="list-group-item">
            <div class="row">
            	<div class="col-xs-12 col-md-6">
            		<div class='leftPost'>
	                    <img height="70px" src="{{ $post->thumbnail_url }}"/>
	                    	<div class='vote'>
	                    		<!-- need better photos -->
			               	 	<a href="#"><img src="img/shield.png" width="30px"/></a>
		               			<a href="#"><img class='pull-right' src="img/sword.png" width="25px"/></a>
		               		</div>
	               	</div>	
	               	<div class='rightPost'>
	                    {{ link_to($post->url, $post->title) }}
	                    <div class="mic-info">
	                        Posted {{ showTimeAgo($post->created_at) }} by
	                        {{ link_to("u/".$post->user->username, $post->user->username) }}
	                    </div>
	                    <div class="rating">
	                    	@if($post->nsfw == true)
	                    	<span class="warning">[NSFW]</span>
	                    	@endif
	                    	@if($post->gore == true)
	                    	<span class="warning">[Gore Warning]</span>
	                    	@endif
	                    </div>
	                    <!-- Removed for now - Not completely neccessary atm
	                    <button type="button" class="btn btn-primary btn-xs" title="Comments">
	                        <span class="glyphicon glyphicon-comment"></span>
	                    </button> -->

	                    @if(Auth::check())
	                    	@if($post->follows->count() > 0)
		                         <button type="button" class="btn btn-xs btn-success favorite clicked" title="Follow" data-post="{{ $post->id }}" data-user="{{ Auth::user()->id }}">
		                        	<span class="glyphicon glyphicon-star"></span>
		                    	</button>
	                    	@else
	                    		<button type="button" class="btn btn-xs btn-success favorite" title="Follow" data-post="{{$post->id}}" data-user="{{ Auth::user()->id }}">
	                        		<span class="glyphicon glyphicon-star"></span>
	                    		</button>
	                    	@endif
		                    <button type="button" class="btn btn-danger btn-xs flag" title="Flag" data-post="{{ $post->id }}" data-user="{{ Auth::user()->id }}">
		                        <span class="glyphicon glyphicon-flag"></span>
		                    </button>
	                    @endif
	                    <!-- link to category -->
	                    <a href="#" class="btn btn-info btn-xs" role="button">Funny</a>

	                    <a class="btn btn-xs btn-success play" title="Play" href="{{$post->url}}?iframe">
		                	<span class="glyphicon glyphicon-play"></span>
		                </a>
	                </div>
	            </div>
	                <div class="col-xs-12 col-md-6">
	                	<div id='subBox' class="pull-right">
		                   <iframe width='300' height='105' frameborder='0' src='http://www.youtube.com/subscribe_widget?p={{ $post->video_AutherID }}'></iframe>
		               </div>
	               	</div>
            </div>
        </li>