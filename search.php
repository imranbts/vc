<?php
get_header(); ?>

<link rel="stylesheet" href="http://viftech.linuxdemos.me/wp-content/themes/viftech/assets/css/blog.css" />


<section class="section-fluid search_result_page_search_box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="close_search_modal_btn">
                    <img src="https://gbksoft.com/blog/wp-content/themes/gbkblog/img/close-ic.svg" alt="Close">
                </div>
                <form class="search_form" method="get" action="<?php echo get_site_url();?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="s" placeholder="Search...">
                        <button type="submit"><i class="fal fa-search"></i></button> 
                    </div>    
				</form>
				<div class="search_result_description">
					<p>Displaying 295 results for “ <b><?php echo get_search_query(); ?></b> ”.</p>
				</div>
            </div> 
        </div>
    </div>
</section>
	


<section class="section-fluid">
    <div class="container-fluid">
    
        

		<?php
		
		$SearchQuery = get_search_query();
        
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        $BlogPosts_arg = array(
			'post_type' => 'post',
			's' => $SearchQuery,
            'number' => 9,
            'order'   => 'DESC',
            'paged'     => $paged,
            'post__not_in' => array($blog_recent_post_id),
        );
        $BlogPosts = new WP_Query( $BlogPosts_arg ); 

        //var_dump($BlogPosts);

if ( $BlogPosts->have_posts() ) : ?>

   <div class="row">

    <?php while ( $BlogPosts->have_posts() ) : $BlogPosts->the_post(); 
        $post_id = get_the_id();

        
    ?>
        
    <?php
    $post_image = 'http://www.mobileservicesolutions.com.au/wp-content/uploads/2013/11/dummy-image-landscape.jpg';
    if(!empty(get_the_post_thumbnail_url())){
        $post_image = get_the_post_thumbnail_url();
    }
    ?>

        <div class="col-md-4">
                <div class="post_bx">
                    <div class="post_img_bx">
                        <a href="#">
                            <img class="post_image" src="<?php echo $post_image?>" />
                        </a>
                    </div>
                    <?php
                    $post_categories = wp_get_post_categories( $post_id );
                    $cats = array();
                         
                    foreach($post_categories as $c){
                        $cat = get_category( $c );
                        $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
                    }
                    /*var_dump( $cats);*/
                    ?>
                    <ul class="post_categories">
                        <?php foreach($cats as $cat){?>  
                        <li><a href="<?php echo $cat['slug'];?>"><?php echo $cat['name'];?></a></li>
                        <?php }?>
                    </ul>
                    <a href="<?php the_permalink(); ?>"><h2 class="post_title"><?php the_title();?></h2></a>
                    <?php the_excerpt(); ?>
                    <span class="post_rating">Rating  — 5 (2 voices) by <span><?php the_author(); ?></span> on <span><?php the_date(); ?></span></span>
                </div>
            </div>
            
    <?php endwhile; ?>

    </div>

<?php 
/*post_pagination(); */
kriesi_pagination($BlogPosts->max_num_pages);
?>

<?php else : ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


<?php
// Restore original post data.
wp_reset_postdata();
?>

                      

        

    </div>
</section>


<?php
get_footer();
