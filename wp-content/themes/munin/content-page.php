  <article id="post-<?php the_ID(); ?>" >
    <div class="persist-header post-title animated">
      <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'لینک مستقیم به %s', '_s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <div class="format-box">
        <?php
          $page_slug = $post->post_name;
          if ( $page_slug == "contact" ) { print '<i class="fa fa-envelope-o"></i>';  }
          else if ( $page_slug == "hire" ) { print '<i class="fa fa-gears"></i>';  }
          else if ( $page_slug == "javad" ) { print '<i class="fa fa-info"></i>';  }
          else if ( $page_slug == "donate" ) { print '<i class="fa fa-money"></i>';  }
          else { print '<i class="fa fa-bookmark-o"></i>';  }
        ?>
      </div>
    </div>

    <div class="container details">
      <?php the_content(); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'صفحه:', '_s' ), 'after' => '</div>' ) ); ?>
      <?php edit_post_link( __( 'ویرایش', '_s' ), '<span class="edit-link">', '</span>' ); ?>
    </div>
  </article>