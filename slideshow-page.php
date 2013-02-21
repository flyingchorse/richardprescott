<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 1.0
 */
 
 
 
 /* Start Loop */
  $counter = 1;
 ?>
 <div id="supersize">
 <?php
 			$args = array('post_type' => 'attachment' ,'numberposts' => 3 ); 
			$attachments = get_posts($args);
		
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_url($attachment->ID);
				
 /* Start Loop */
  ?>
  	
       <img <?php if ( $counter ==1) { ?>class="activeslide" <?php }?> src="<?php echo $imageloader; ?>"/>
      
	

  <?php
  

  
 /* End Loop */
 
 $counter++;
				}
			}
			 /* End Loop */
?>  </div>

