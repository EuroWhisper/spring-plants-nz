<?php
/**
 * Template name: About Page
 */
?>
 
<?php get_header(); ?>

 <div class="row">
     <div class="col-md-12">
        <section id="about-section">
            <img src="<?php echo get_template_directory_uri(); ?>/img/about-image.jpg" class="about-image img img-fluid rounded"></img>
            <?php while ( have_posts() ) : the_post(); 
                the_content();
            endwhile; ?>
        </section>
    </div>
</div>

<?php get_footer();?>