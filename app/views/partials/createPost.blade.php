                      {{ Form::open(array('url' => 'p/process', 'method' => 'POST')) }}
                        <div class="form-group">
                            {{ Form::label('title', 'YouTube URL:') }}
                            {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Paste URL here', 'id' => 'url']) }}
                            <?php echo $errors->first('url', '<span class=error>:message</span>'); ?>
                            <br/>
                            <span id="embed"></span>
                            <span id="subBox"></span>
                        </div>
                        {{ Form::hidden('img', null, ['id' => 'imageUrl']) }}
                        {{ Form::hidden('videoID', null, ['id' => 'videoID']) }}
                        {{ Form::hidden('videoAuthor', null, ['id' => 'videoAuthor']) }}
                        <script>
                        function youtube_parser(url){
                            var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
                            var match = url.match(regExp);
                            if (match&&match[7].length==11){
                                return match[7];
                            }else{
                                return false;
                            }
                        }
                        $(document).ready(function() {
                            $("#url").blur(function(){
                              $("#loading").show();
                              if ( $("#url").val().length > 0 )
                                {
                                  var videoID = youtube_parser($("#url").val());
                                  if(videoID == false){
                                    $("#embed").html("<span class='error'>Incorrect URL, Please enter a URL from youtube.</span>");
                                  }
                                  else{
                                    var string = "<iframe width='560' height='315' src='http://www.youtube.com/embed/" + videoID +"' frameborder='0' allowfullscreen></iframe>";
                                    $("#embed").html(string);
                                    $("#imageUrl").val("http://img.youtube.com/vi/"+ videoID + "/0.jpg");
                                    $("#videoID").val(videoID);
                                    //ajax to subscribe bit
                                    $.ajax({
                                      dataType: "json",
                                      url: "https://gdata.youtube.com/feeds/api/videos/" + videoID +"?v=2&alt=json",
                                      success: function (data){
                                         var subString = "<br/><br/><iframe width='300' height='105' frameborder='0' src='http://www.youtube.com/subscribe_widget?p="+ data.entry.author[0].yt$userId.$t +"'></iframe>";
                                         $("#subBox").html(subString); 
                                         $("#videoAuthor").val(data.entry.author[0].yt$userId.$t);
                                      },
                                      error: function (jqXHR, exception) {
                                          $("#subBox").html('Error retrieving sub box.');
                                      }
                                    });
                                  }
                                }
                              });
                        });
                        </script>
                        <div class="form-group">
                            {{ Form::label('title', 'Title:') }}
                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                            <?php echo $errors->first('title', '<span class=error>:message</span>'); ?>
                        </div>
                        <div class="form-group">
                          {{ Form::label('title', 'Description:') }}
                          {{ Form::textarea('desc', null, ['class' => 'form-control']) }}
                          <?php echo $errors->first('desc', '<span class=error>:message</span>'); ?>
                        </div>
                        <div class="form-group">
                          {{ Form::label('title', 'NSFW:') }}
                          {{ Form::hidden('nsfw', '0'); }}
                          {{ Form::checkbox('nsfw', '1') }}
                          <br/>
                          {{ Form::label('title', 'Gore:') }}
                          {{ Form::hidden('gore', '0'); }}
                          {{ Form::checkbox('gore', '1') }}
                        </div>
                        <center>{{ HTML::image(Captcha::img(), 'Captcha image') }}</center>
                        <br/>
                        <div class="form-group">
                            {{ Form::text('captcha', null, ['class' => 'form-control', 'placeholder' => 'Enter Captcha here']) }}
                            <?php echo $errors->first('captcha', '<span class=error>:message</span>'); ?>
                        </div>
                        <div>
                          {{ Form::submit("Create", ['class' => 'btn btn-lg btn-success btn-block']) }}
                        </div>
                      {{ Form::close() }}   