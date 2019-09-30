<?php
get_header();
?>

<link rel="stylesheet" href="http://viftech.linuxdemos.me/wp-content/themes/viftech/assets/css/blog.css" />





<?php

while ( have_posts() ) :
    the_post();
endwhile; // End of the loop.

?>


<?php
    $post_image = 'http://www.mobileservicesolutions.com.au/wp-content/uploads/2013/11/dummy-image-landscape.jpg';
    if(!empty(get_the_post_thumbnail_url())){
        $post_image = get_the_post_thumbnail_url();
    }
?>



<section class="section-fluid mt-100 section-fluid">
    <div class="container-fluid">

         <?php
           $post_id = get_the_id();
           $post_categories = wp_get_post_categories( $post_id );
           $cats = array();

           foreach($post_categories as $c){
               $cat = get_category( $c );
               $cats[] = array( 'id' => $cat->cat_ID, 'name' => $cat->name, 'slug' => $cat->slug, 'perma_link' => get_category_link( $cat->cat_ID ) );
           }
           /* var_dump( $post_categories); */
         ?>
        <ul class="post_categories">
            <li><a href="/blog">Blog</a></li>
            <?php foreach($cats as $cat){?>  
            <li><a href="<?php echo $cat['perma_link']; ?>"><?php echo $cat['name'];?></a></li>
            <?php }?>
        </ul>

        <h1 class="single_post_title"><?php the_title();?></h1>
        <div class="row">
            <div class="col-md-9">
                <img class="img-full" src="<?php echo $post_image; ?>">
                <div class="post_content_wrapper"><?php the_content();?></div>

<!---- Start - Post Rating System ---->                
                <?php// if(function_exists('the_ratings')) { the_ratings(); } ?>

<div class="rating" data-postid="<?php echo get_the_id();?>" itemscope="" itemtype="http://schema.org/Article" data-nonce="10f7594f75">
    <div class="rating__bar"></div>
    <div class="rating__list">
        <div>
            <button class="rating__item rating__item--first" type="button" data-rate="1" role="button" >
                <span class="rating__eye"></span>
                <span class="rating__mouth"></span>
            </button>
        </div>
        <div>
            <button class="rating__item rating__item--second" type="button" data-rate="2" role="button" >
                <span class="rating__eye"></span>
                <span class="rating__mouth"></span>
            </button>
        </div>
        <div>
            <button class="rating__item rating__item--thirth" type="button" data-rate="3" role="button" >
                <span class="rating__eye rating__eye--left"></span>
                <span class="rating__eye rating__eye--right"></span>
                <span class="rating__blush"></span>
                <span class="rating__mouth"></span>
            </button>
        </div>
        <div>
            <button class="rating__item rating__item--fourth" type="button" data-rate="4" role="button" >
                <span class="rating__eye rating__eye--left"></span>
                <span class="rating__eye rating__eye--right"></span>
                <span class="rating__blush"></span>
                <span class="rating__mouth"></span>
            </button>
        </div>
        <div>
            <button class="rating__item rating__item--fifth" type="button" data-rate="5" role="button" >
                <span class="rating__eye rating__eye--left"></span>
                <span class="rating__eye rating__eye--right"></span>
                <span class="rating__blush"></span>
                <span class="rating__mouth"></span>
            </button>
        </div>
    </div>
   </div>

   <div class="share-container _mb-20">
      <span class="width-position">Rating:</span>
      <span class="width-position"><span class="post-rating" data-pid="<?php echo $post_id; ?>">    
      <?php 
         //get_post_rating($post_id);
         $voices = get_post_meta($post_id, "voices");
         $voices = ( !empty($voices[0]) ) ? $voices[0] : 0;
         $rating = get_post_meta($post_id, "rating");
         $rating = ( !empty($rating[0]) ) ? $rating[0] : 0;
         $final_rating = $rating / $voices;
         $final_rating = ( !empty($final_rating) ) ? $final_rating : 0;
         $result = ' '.$final_rating.' ('.$voices.' voices)';
         echo $result;
       ?>
       </span></span>
   </div>

      <!---- End - Post rating System ---->

      <div class="tags-container"><span class="width-position"># Tags:</span>
         <div class="tags-block inline_tags_block">
            <?php 
               $post_tags = get_the_tags();
               if (!empty($post_tags)) {
                  foreach ($post_tags as $tag) {
                     echo '<a href="' . get_tag_link($tag->term_id) . '" class="tag-link" rel="nofollow" >' . $tag->name . '</a>';
                  }
               } 
            ?>
          </div>
      </div>


                <div class="row">
                  <hr class="doted-hr">
                  <div class="col-md-6 text-align-left">
                     <!--<h3 class="comment_btn_title">One comment</h3>-->
                  </div>
                  <div class="col-md-6 text-align-right">
                     <button class="comment_form_collapse_btn">Leave a comment</button>
                  </div>
                  <div class="col-md-12">
                     <div id="comment_form_box" class="comment_form_box collapse">
                        <a class="comment_form_box_close_btn"><img src="https://gbksoft.com/blog/wp-content/themes/gbkblog/img/close-ic.svg" alt="Close"></a>
                           <p>Leave a Reply</p>

                           <form class="comment_form" id="comment_form" method="post">
                             <div class="form-row">
                               <div class="form-group col-md-4">
                                 <input type="hidden" class="form-control" name="COMMENT_POST_ID" id="COMMENT_POST_ID" value="<?php echo get_the_id();?>">
                                 <input type="text" class="form-control" name="NAME" id="NAME" placeholder="NAME">
                               </div>
                               <div class="form-group col-md-4">
                                 <input type="email" class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL">
                               </div>
                               <div class="form-group col-md-4">
                                 <input type="text" class="form-control" name="WEBSITE" id="WEBSITE" placeholder="WEBSITE">
                               </div>
                               <div class="form-group col-md-12">
                                    <textarea class="form-control" name="COMMENT" id="COMMENT" rows="5" placeholder="COMMENT"></textarea>
                               </div>
                               <div class="form-group col-md-12 text-align-right">
                                    <button class="comment_form_submit_btn" id="comment_form_submit_btn">post comment</button>
                               </div>
                             </div>
                           </form>

                     </div>
                     <hr class="doted-hr">
                  </div> 
                </div>
                
<div class="row">           
    <div class="col-md-12"><h3 class="similer_posts_title">Similar Blog Articles</h3></div>  
<?php 

   $current_post_categories = get_the_category($post->ID);

   if ($current_post_categories) {
      $current_post_categories_ids = array();
      foreach($current_post_categories as $current_post_category) {
         $current_post_categories_ids[] = $current_post_category->term_id;
      }
      
      $args=array(
      'category__in' => $current_post_categories_ids,
      'post__not_in' => array($post->ID),
      'posts_per_page'=> 3, // Number of related posts that will be shown.
      'caller_get_posts'=>1
      );

      $current_post_related_posts = new wp_query( $args );
      
      if( $current_post_related_posts->have_posts() ) {

      
      while( $current_post_related_posts->have_posts() ) {
             $current_post_related_posts->the_post();
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
                    $post_id = get_the_id();
                    $post_categories = wp_get_post_categories( $post_id );
                    $cats = array();
                         
                    foreach($post_categories as $c){
                        $cat = get_category( $c );
                        $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'perma_link' => get_category_link( $cat->cat_ID ) );
                    }
                    /*var_dump( $cats);*/
                    ?>
                    <ul class="post_categories">
                        <?php foreach($cats as $cat){?>  
                        <li><a href="<?php echo $cat['perma_link'];?>"><?php echo $cat['name'];?></a></li>
                        <?php }?>
                    </ul>
                    <a href="<?php the_permalink(); ?>"><h2 class="post_title"><?php the_title();?></h2></a>
                    <?php the_excerpt(); ?>  
                    <span class="post_rating">Rating  — 5 (2 voices) by <span><?php the_author(); ?></span> on <span><?php the_date(); ?></span></span>
                </div>
            </div>
            

<?php 
      }

      }
   }

wp_reset_query(); 

?>



         </div>

            </div>



           <div class="col-md-3">
                <h3 class="hdng_sm_blg fs-21 pb-25 mb-30">Categories</h3>
                <ul class="ul_article mb-60">
                    <li><a href="/blog">All articles</a></li>
                  <?php

                  $categories = get_categories( array(
                     'type'        => 'post',
                     'child_of'    => 0,
                     'parent'      => '',
                     'orderby'     => 'name',
                     'order'       => 'ASC',
                     'hide_empty'  => true,
                     'hierarchical'=> 1,
                     'exclude'     => '',
                     'include'     => '',
                     'number'      => '',
                     'taxonomy'    => 'category',
                     'pad_counts'  => false 
                  ) );

                  foreach ( $categories as $category ) {
                     printf( '<li><a href="%1$s">%2$s</a></li>',
                         esc_url( get_category_link( $category->term_id ) ),
                         esc_html( $category->name )
                     );
                 }

                  ?>

                </ul>

                <h3 class="hdng_sm_blg fs-21 pb-25 mb-30">People are talking about</h3>

                <div class="tags-block mb-70 mb-md-40">

                  <?php

                  $tags_args = array(
                     'orderby' => 'name',
                     'order' => 'ASC',
                     'hide_empty ' => true,
                     'exclude'     => '',
                     'include'     => '',
                     'number'      => '',
                  );

                    $tags = get_tags();
                    $html = '';
                    foreach ( $tags as $tag ) {
                        $tag_link = get_tag_link( $tag->term_id );
                                 
                        $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='tag-link' >";
                        $html .= "{$tag->name}</a>";
                    }
                    echo $html;

                  ?>

                </div>

               <div id="blog_fixed_info_box" class="blog_fixed_info_box"> 

                <div class="search_frm mb-40">
                    <form method="get" action="<?php echo get_site_url();?>">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="s" placeholder="SEARCH">
                            <div class="input-group-append">
                              <button type="submit" class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="subscribe-form__container">
                    <div class="subscribe-form__content">
                        <p class="subscribe-form__title">Need a Quick Help?</p>
                        <p class="subscribe-form__desc">Ask our IT-experts and get answer within 24 hours</p>
                    </div>
                    <a href="#contact" class="send-btn" ref="nofollow">CONTACT NOW</a>
                </div>

                <ul class="social_block">
                    <li>
                        <a href="https://www.facebook.com/ViftechSolutions"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/viftech_"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/viftech-solutions-pvt--ltd-"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                </ul>

              </div>      

           </div>
        </div>
    </div>    
</section>



<?php
echo do_shortcode('[vc_row][vc_column][ProjectInMind project_in_mind_title_01="YOU\'VE GOT" project_in_mind_title_02="A PROJECT IN MIND" project_in_mind_title_03="WHAT\'S NEXT?" project_in_mind_description="Sent us a message with a brief description of your project. Our expertteam will review it and get back to you within one business day withfree consultation and to discuss the next steps." project_in_mind_form="981"][/vc_column][/vc_row][vc_row][vc_column][AwardsCarousel][/vc_column][/vc_row]');
?>



<?php
get_footer();
?>


<style>

.blog_fixed_info_box{
   position: -webkit-sticky;
  position: sticky;
  margin: 50px 0px 50px;
  top: 200px;
  
}
</style>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/stickyfill.js"></script>

<script>

var sidebar = document.getElementById('blog_fixed_info_box');
Stickyfill.add(sidebar);

</script>