<article id="post-<?php the_ID(); ?>" <?php post_class('results'); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'صفحه:', '_s' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'ویرایش', '_s' ), '<span class="edit-link">', '</span>' ); ?>

	</div><!-- .entry-content -->
	
	<footer class="entry-meta">
		<span class="clock"> <i class="icon-time"></i><abbr title="<?php the_time('نوشته شده در j F Y؛ ساعت g:i a');?>"> <?php days_ago(); ?></abbr></span>
		<span class="perml"> <i class="icon-bolt"></i> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'فقط درباره %s بخوانید', '_s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">لینک مستقیم</a></span>
	</footer><!-- #entry-meta -->
	
</article><!-- #post-<?php the_ID(); ?> -->