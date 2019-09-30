<?php
/**
 * Template Name: Blog
 */

get_header();
?>

<!--
<link rel="stylesheet" href="http://viftech.linuxdemos.me/wp-content/themes/viftech/assets/css/blog.css" />
-->

<section class="section-fluid mt-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="hps_heading">BLOG</h1>
                <h2 class="hps_sub_heading">THE BEST ARTICLES</h2>
            </div>
        </div>
        <div class="row best_post">

            <?php  
                    $blog_recent_post_arg = array(
                        'post_type' => 'post', 
                        'posts_per_page' => 1,
                        //'order'   => 'DESC',
                        'orderby' => 'date', 
                        
                    );
                    $blog_recent_post = new WP_Query( $blog_recent_post_arg ); 
                    $blog_recent_post_id = '';

                    if ( $blog_recent_post->have_posts() ) {
                        while ( $blog_recent_post->have_posts() ) {
                            $blog_recent_post->the_post();
                            // do stuff

                            $blog_recent_post_id = get_the_id();

                            $post_image = 'http://www.mobileservicesolutions.com.au/wp-content/uploads/2013/11/dummy-image-landscape.jpg';
                            if(!empty(get_the_post_thumbnail_url())){
                                $post_image = get_the_post_thumbnail_url();
                            }

                ?>

                    <div class="col-md-6">
                        <img class="best_post_image" src="<?php echo $post_image?>">
                    </div>
                    <div class="col-md-6">
                        <div class="best_post_details">
                        <?php
                    $blog_recent_post_categories = wp_get_post_categories( $blog_recent_post_id );
                    $blog_recent_post_cats = array();
                         
                    foreach($blog_recent_post_categories as $c){
                        $cat = get_category( $c );
                        $blog_recent_post_cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
                    }
                    /*var_dump( $blog_recent_post_cats);*/
                    ?>
                        <ul class="best_post_details_categories">
                            <?php foreach($blog_recent_post_cats as $blog_recent_post_cat){?>  
                                <li><a href="<?php echo $blog_recent_post_cat['slug'];?>"><?php echo $blog_recent_post_cat['name'];?></a></li>
                            <?php }?>  
                        </ul>

                            <a href="<?php the_permalink(); ?>"><h2><?php the_title();?></h2></a>
                            <?php the_excerpt(); ?>
                            <span class="best_post_rating">Rating  — 
                            <?php 
                              $voices = get_post_meta($blog_recent_post_id, "voices");
                              $voices = ( !empty($voices[0]) ) ? $voices[0] : 0;
                              $rating = get_post_meta($blog_recent_post_id, "rating");
                              $rating = ( !empty($rating[0]) ) ? $rating[0] : 0;
                              $final_rating = $rating / $voices;
                              $final_rating = ( !empty($final_rating) ) ? $final_rating : 0;
                              $result = ' '.$final_rating.' ('.$voices.' voices)';
                              echo $result;
                            ?>
                            by <span><?php the_author(); ?></span> on <span><?php the_date(); ?></span></span>

                        </div>
                    </div>

                <?php            
                        }
                        wp_reset_postdata();
                    }


                    ?>

        </div>

    </div>
</section>



<div class="section-fluid articles-nav__container">
   <div class="container-fluid">
      <div class="articles-nav">
         <div class="articles-nav__menu">
            <a class="articles-nav__menu-link is-active" href="/blog">All articles</a>
            <?php 

$categories = get_categories( array(
    'number' => 7,
    'orderby' => 'count',
    'order'   => 'DESC'
) );
 
foreach( $categories as $category ) {
    $category_name_link = sprintf( 
        '<a class="articles-nav__menu-link" href="%1$s" alt="%2$s">%3$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name )
    );
    echo $category_name_link;
} 

?>

         </div>
         <button class="search-btn overall_blog_search_btn" ><i class="fal fa-search"></i></button>
         <button class="subscribe-btn">subscribe</button>
      </div>
   </div>
</div>


<!---
<div class="section-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form>

                </form>
            </div>
        </div>
    </div>
</div>
--->


<div class="search_modal">
    <section class="section-fluid">
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
                </div> 
            </div>
        </div>
    </section>
</div>





<script>
/* mobile articles menu */
jQuery('.articles-nav__menu-link').on('click', function (e) {
        var elements = jQuery('.articles-nav__menu-link');

        elements.toggleClass('is-show');
        elements.removeClass('is-active');
        jQuery(this).addClass('is-active');
    });

    /* click on hidden mobile articles menu */
    jQuery('body').on('click', function (e) {
        jQuery('.close-tultip').hide();
        var $element = jQuery('.articles-nav__menu');
        if (!$element.is(e.target) && $element.has(e.target).length === 0) {
            jQuery('.articles-nav__menu-link').removeClass('is-show');
        }
    });

</script>


<section class="section-fluid">
    <div class="container-fluid">
    
        

        <?php
        
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        $BlogPosts_arg = array(
            'post_type' => 'post',
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
                    <span class="post_rating">Rating  — 
                    <?php 
                      $voices = get_post_meta($post_id, "voices");
                      $voices = ( !empty($voices[0]) ) ? $voices[0] : 0;
                      $rating = get_post_meta($post_id, "rating");
                      $rating = ( !empty($rating[0]) ) ? $rating[0] : 0;
                      $final_rating = $rating / $voices;
                      $final_rating = ( !empty($final_rating) ) ? $final_rating : 0;
                      $result = ' '.$final_rating.' ('.$voices.' voices)';
                      echo $result;
                    ?>
                    by <span><?php the_author(); ?></span> on <span><?php the_date(); ?></span></span>
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