<?php get_header(); ?>
    <section>
    <?php if ( have_posts() ) : ?>
      <header class="page-header">
        <h2>
          <?php
            if ( is_category() ) {
              printf( __( 'آرشیو دسته: %s', '_s' ), '<span>' . single_cat_title( '', false ) . '</span>' );

            } elseif ( is_tag() ) {
              printf( __( 'آرشیو برچسب: %s', '_s' ), '<span>' . single_tag_title( '', false ) . '</span>' );

            } elseif ( is_author() ) {
              /* Queue the first post, that way we know
               * what author we're dealing with (if that is the case).
              */
              the_post();
              printf( __( 'آرشیو کاربر: %s', '_s' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
              /* Since we called the_post() above, we need to
               * rewind the loop back to the beginning that way
               * we can run the loop properly, in full.
               */
              rewind_posts();

            } elseif ( is_day() ) {
              printf( __( 'آرشیو روزانه: %s', '_s' ), '<span>' . get_the_date() . '</span>' );

            } elseif ( is_month() ) {
              printf( __( 'آرشیو ماهیانه: %s', '_s' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

            } elseif ( is_year() ) {
              printf( __( 'آرشیو سالانه: %s', '_s' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

            } else {
              _e( 'آرشیو', '_s' );

            }
          ?>
        </h2>

        <?php
          if ( is_category() ) {
            // show an optional category description
            $category_description = category_description();
            if ( ! empty( $category_description ) )
              echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

          } elseif ( is_tag() ) {
            // show an optional tag description
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) )
              echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
          }
        ?>
      </header>

      <?php rewind_posts(); ?>

      <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="persist-area post">
                <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to overload this in a child theme then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );
                ?>
            </div>
            <?php endwhile; ?>
            <?php getpagenavi(); ?>
        <?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
            <?php get_template_part( 'no-results', 'archive' ); ?>

    <?php endif; ?>
  </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>