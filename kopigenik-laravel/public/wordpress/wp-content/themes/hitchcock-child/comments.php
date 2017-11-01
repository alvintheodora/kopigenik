<?php if ( post_password_required() ) return; ?>

<?php if ( have_comments() || comments_open() ) : ?>

	<div class="comments-container">			
	
			<div class="comments-inner">
			
				<a name="comments"></a>
				
				<h3 class="comments-title">
					
					<div class="inner">
				
						<?php echo count($wp_query->comments_by_type[comment]) . ' ';
						echo _n( 'Comment' , 'Comments' , count($wp_query->comments_by_type[comment]), 'hitchcock' ); ?>
					
					</div>
					
				</h3>
			
				<div class="comments">
			
					<ol class="commentlist">						
					    <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'hitchcock_comment' ) ); ?>
					</ol>																					
				</div> <!-- /comments -->
				
			</div> <!-- /comments-inner -->
			
	

		<?php $comments_args = array(
			
			'title_reply' =>
				'<div class="inner">' . __('Leave a Reply','hitchcock') . '</div>',
			
			'comment_notes_before' => 
				'',
				
			'comment_notes_after' =>
				'',
		
			'comment_field' => 
				'<p class="comment-form-comment">
					<label for="comment">' . __('Comment','hitchcock') . '</label>
					<textarea id="comment" name="comment" cols="45" rows="6" required></textarea>
				</p>',
			
			'fields' => apply_filters( 'comment_form_default_fields', array(
			
				'author' =>
					'<p class="comment-form-author">
						<label for="author">' . __('Name','hitchcock') . ( $req ? '<span class="required">*</span>' : '' ) . '</label> 
						<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />
					</p>',
				
				'email' =>
					'<p class="comment-form-email">
						<label for="email">' . __('Email','hitchcock') . ( $req ? '<span class="required">*</span>' : '' ) . '</label> 
						<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />
					</p>',
				
				'url' =>
					'<p class="comment-form-url">
						<label for="url">' . __('Website','hitchcock') . '</label>
						<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
					</p>')
			),
		);
		
		comment_form($comments_args);
		
		?>
		
	</div> <!-- /comments-container -->
	
<?php endif; ?>

<input type="hidden" name="post_id" id="post_id" value="<?php echo $post->ID; ?>">

<script type="text/javascript">
	jQuery(document).ready(function(){
        jQuery.ajax({
              method: "GET",
              url: "/ajaxGetComment", 
              data: {post_id: jQuery('#post_id').val()},
              dataType: "json"
            })
            .done(function(data){     
            	console.log(data.length);
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
				
                
               // jQuery("#csrf_field").val(data.csrf_token);                                          
            })
            .fail(function(data){                   
                //jQuery("#navbarName").html('GUEST <span class="caret"></span>');                    
            });
    });
</script>