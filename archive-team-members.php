<?php get_header(); ?>

helooo ejaz 
<?php
 if ( have_posts() ) {
	while ( have_posts() ) {
        the_post(); 
        the_content();
        the_title();
    }
}else{
    echo 'there is no post';
}
?>

<?php get_footer(); ?>