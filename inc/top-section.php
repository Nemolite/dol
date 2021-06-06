<?php
/**
 * Top Section
 */
?>

<div id="main" class="clearfix">
	<div class="inner-wrap clearfix">
        <div class="block-top-section">
            <div class="top-section-left">
            <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
        $args_info = array(   
            'post_type'    => 'top_section_info',    
	        'posts_per_page' => 1,   
	
        );
        $query_info = new WP_Query( $args_info ); 
        if( $query_info->have_posts() ){
	        while( $query_info->have_posts() ){
		        $query_info->the_post();
    ?>

    <?php the_content(); ?>   
 				
    <?php
	    }
	        wp_reset_postdata(); 	
    } 
    ?>
            </div>
            <div class="top-section-right">
            <?php echo do_shortcode('[metaslider id="63"]'); ?>  
                </div>
        </div>
    </div>
</div>                    