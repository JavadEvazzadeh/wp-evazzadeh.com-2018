<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to _s_comment() which is
 * located in the functions.php file.
 *
 * @package _s
 * @since _s 1.0
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
  return;
?>

  <div id="comments" class="persist-area-r">
    <div class="persist-header freeheight">
      <h2><a href="<?php echo(get_permalink()); ?>#comments" title="مرور دیدگاه ها">مرور <?php printf( _n('یک ديدگاه برای %2$s', '%1$s ديدگاه برای %2$s' , get_comments_number(), '_s' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></a></h2>
      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav>
          <div id="nav-prev"><?php previous_comments_link( '<i title="دیدگاه های قدیمی تر" class="fa fa-fast-backward"></i>' ); ?></div>
          <div id="nav-next"><?php next_comments_link( '<i title="دیدگاه های جدیدد تر" class="fa fa-fast-forward"></i>' ); ?></div>
        </nav>
      <?php endif; // check for comment navigation ?>
    </div>


<?php if ( have_comments() ) : ?>
    <div class="container">
      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="navigation comment-nav-above">
          <div class="alignright"><?php previous_comments_link( __( 'دیدگاه های قدیمی تر &rarr;', '_s' ) ); ?></div>
          <div class="alignleft"><?php next_comments_link( __( '&larr; دیدگاه های جدیدتر', '_s' ) ); ?></div>
        </nav>
      <?php endif; // check for comment navigation ?>

      <ol class="rectangle-list">
        <?php
          /* Loop through and list the comments. Tell wp_list_comments()
           * to use _s_comment() to format the comments.
           * If you want to overload this in a child theme then you can
           * define _s_comment() and that will be used instead.
           * See _s_comment() in functions.php for more.
           */
          wp_list_comments( array( 'callback' => '_s_comment' ) );
        ?>
      </ol>

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="navigation comment-nav-below">
          <div class="alignright"><?php previous_comments_link( __( '&larr; دیدگاه های قدیمی تر', '_s' ) ); ?></div>
          <div class="alignleft"><?php next_comments_link( __( 'دیدگاه های جدیدتر &rarr;', '_s' ) ); ?></div>
        </nav>
      <?php endif; // check for comment navigation ?>
    </div>
<?php endif; // have_comments() ?>

    <?php
      // If comments are closed and there are no comments, let's leave a little note, shall we?
      if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
      <p class="container nocomments"><?php _e( 'دیدگاه بسته شده است.', '_s' ); ?></p>
    <?php endif; ?>



    <?php //comment_form(array('comment_notes_after'=>'' )); ?>

    <div id="respond" class="container">
      <div class="cancel-comment-reply">
        <small><?php cancel_comment_reply_link(); ?></small>
      </div>
      <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
         <p>شما باید <a href="<?php echo wp_login_url( get_permalink() ); ?>"> وارد شوید </a> تا بتوانید دیدگاهی ارسال کنید.</p>
      <?php else : ?>

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
          <?php if ( is_user_logged_in() ) : ?>
             <p>شما با نام کاربری <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> وارد شده اید. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">بیرون رفتن &raquo;</a></p>
          <?php else : ?>
            <div class="row">
              <div class="span4">
                <input required placeholder="نام (اجباری)" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>"  tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
              </div>
              <div class="span4">
                <input required placeholder="Email (Require)" type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
              </div>
              <div class="span4">
                <input placeholder="Website" type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" />
              </div>
            </div>
          <?php endif; ?>
            <div class="row">
              <textarea required placeholder="دیدگاه خود را اینجا بنویسید" name="comment" id="comment" rows="4" tabindex="4"></textarea><br />
            </div>
            <div class="row">
              <div class="form-submit">
                <input name="submit" type="submit" id="submit" tabindex="5" value="ثبت دیدگاه" />
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
              </div>
            </div>
        </form>
      <?php endif; // If registration required and not logged in ?>
    </div>
  </div>
