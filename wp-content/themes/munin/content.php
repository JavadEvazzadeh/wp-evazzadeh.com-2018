  <article id="post-<?php the_ID(); ?>" >
    <div class="persist-header post-title animated">
      <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'لینک مستقیم به %s', '_s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <div class="format-box">
        <?php
          $format = get_post_format();
            //'video','gallery','audio','link','image','quote','aside','chat','status'
            if ( $format == "video" ) { print '<i class="fa fa-film"></i>';  }
            else if ( $format == "gallery" ) { print '<i class="fa fa-camera-retro"></i>';  }
            else if ( $format == "audio" ) { print '<i class="fa fa-music"></i>';  }
            else if ( $format == "link" ) { print '<i class="fa fa-link"></i>';  }
            else if ( $format == "image" ) { print '<i class="fa fa-picture-o"></i>';  }
            else if ( $format == "quote" ) { print '<i class="fa fa-quote-left"></i>';  }
            else if ( $format == "aside" ) { print '<i class="fa fa-pencil"></i>';  }
            else if ( $format == "chat" ) { print '<i class="fa fa-comments"></i>';  }
            else if ( $format == "status" ) { print '<i class="fa fa-thumbs-o-up"></i>';  }
            else { print '<i class="fa fa-file"></i>';  }
        ?>
      </div>
    </div>
    <span class="clock"> <i class="fa fa-clock-o"></i> <abbr title="<?php the_time('نوشته شده در j F Y؛ ساعت g:i a');?>"> <?php days_ago(); ?></abbr></span>

    <div class="container details">
      <?php the_content(); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'صفحه:', '_s' ), 'after' => '</div>' ) ); ?>
    </div>
  </article>
