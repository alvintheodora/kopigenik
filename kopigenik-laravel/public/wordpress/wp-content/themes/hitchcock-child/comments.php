<?php if ( post_password_required() ) return; ?>

<?php if ( have_comments() || comments_open() ) : ?>

	<div class="comments-container">			
	
			<div class="comments-inner">
			
				<a name="comments"></a>
				
				<h3 class="comments-title">
					
					<div id="comments-amount" class="inner">
				
						
					
					</div>
					
				</h3>
			
				<div class="comments">
			
					<ol class="commentlist">						
					    <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'hitchcock_comment' ) ); ?>
					</ol>																					
				</div> <!-- /comments -->
				
			</div> <!-- /comments-inner -->


			
			<div id="respond" class="comment-respond" style="display: none;">
				<h3 id="reply-title" class="comment-reply-title">
					<div class="inner">Leave a Reply</div> 
				</h3>			
				<form action="/storeComment" method="post" id="commentform" class="comment-form">
					<input id="csrf_field" type="hidden" name="_token" value="">
					<p class="comment-form-comment">
						<label for="comment">Comment</label>
						<textarea id="comment" name="comment" cols="45" rows="6" required="" placeholder="Maximum 255 characters"></textarea>
					</p>
					<p class="form-submit">
						<input name="submit" type="submit" id="submit" class="submit" value="Post Comment"> <input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" id="comment_post_ID">
						<input type="hidden" name="comment_parent" id="comment_parent" value="0">
					</p>			
				</form>
			</div>

		
		
		
	</div> <!-- /comments-container -->
	
<?php endif; ?>



<script type="text/javascript">

	jQuery(document).ajaxComplete(function(){
        	//alert(current_user_name);
        	if(current_user_name!=null){
        		jQuery('#respond').css('display','block');
        		jQuery('form #csrf_field').each(function(){
					jQuery(this).val(current_csrf_token);
				});
        	}
			
	
		});


		//get laravel comment
        jQuery.ajax({
              method: "GET",
              url: "/ajaxGetComment", 
              data: {post_id: <?php echo $post->ID; ?>},
              dataType: "json"
            })
            .done(function(data){     
            	jQuery('#comments-amount').text(data.length + ' COMMENTS');           	
            	for (i = 0; i < data.length; i++) { 
				    jQuery('.commentlist').append(
				    	'<li>'+
					    	'<div class="comment">' + 
						    	'<h4 class="comment-title">'+ data[i].user.name + 
						    		'<span>'+data[i].updated_at+'</span>' + 
						    	'</h4>'+
						    	'<div class="comment-content post-content">'+
						    		'<p>' +  data[i].content + '</p>'+
						    	'</div>'+
					    	'</div>'+
				    	'</li>'
				    	);
				} 
				
                                                       
            })
            .fail(function(data){                   
                                
            });


  
</script>