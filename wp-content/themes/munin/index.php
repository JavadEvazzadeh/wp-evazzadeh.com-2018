<?php get_header(); ?>
<?php get_sidebar(); ?>

  <section>
    <?php if ( have_posts() ) : ?>
      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <div class="persist-area post">
        <?php
          /* Include the Post-Format-specific template for the content.
           * If you want to overload this in a child theme then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          if(is_home())
          {
            $format = get_post_format();
            if( $format == "status" || $format == "aside" || $format == "chat")
            {
              // var_dump("yes: ". $format);
            }
            else
            {
              // get_template_part( 'content', get_post_format() );
            }
              get_template_part( 'content', get_post_format() );
          }
          else
          {
            get_template_part( 'content', get_post_format() );
          }
        ?>
      </div>
      <?php endwhile; ?>
      <?php getpagenavi(); ?>
    <?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
      <?php get_template_part( 'no-results', 'index' ); ?>
    <?php endif; ?>
  </section>

<?php get_footer(); ?>