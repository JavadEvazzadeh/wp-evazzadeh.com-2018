<?php
/* Template Name: Donate */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

    <section>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="persist-area post">
        <?php get_template_part( 'content', 'page' ); ?>
      </div>

  <section id="donate" class="container details">
<?php echo create_donate() ?>
  </section>

      <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template( '', true );
      ?>
    <?php endwhile; // end of the loop. ?>

  </section>

<?php get_footer(); ?>