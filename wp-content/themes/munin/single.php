<?php get_header(); ?>
<?php get_sidebar(); ?>

    <section>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="persist-area post">
        <?php get_template_part( 'content', get_post_format() ); ?>
<?php
if(get_post_format() === 'video')
{
  $dl_url = SmartMetaBox::get('dlurl');
  if(isset($dl_url) && $dl_url!=='#' && $dl_url!="/")
  {
?>
        <div class="dlbutton">
          <a href="<?php echo(SmartMetaBox::get('dlurl')); ?>" title="<?php echo(SmartMetaBox::get('dltitle')); ?>">دانلود کنید</a>
          <p class="dltop"><?php echo(SmartMetaBox::get('dltitle')); ?></p>
          <p class="dlbottom"><?php echo(SmartMetaBox::get('dlsize')); ?></p>
        </div>
      <?php
    }
}
?>
        <div class="postTags"><?php the_tags('',' '); ?></div>
        <div class="relatedPosts"><?php related_post(); ?></div

      </div>
      <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template( '', true );
      ?>
    <?php endwhile; // end of the loop. ?>
  </section>

<?php get_footer(); ?>