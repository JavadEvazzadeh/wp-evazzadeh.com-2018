	<article id="post-<?php the_ID(); ?>" >
		<div class="persist-header post-title animated">
			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'لینک مستقیم به %s', '_s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="format-box">
				<i class="fa fa-comments"></i>
			</div>
		</div>
		<span class="clock"> <i class="icon-time"></i> <abbr title="<?php the_time('نوشته شده در j F Y؛ ساعت g:i a');?>"> <?php days_ago(); ?></abbr></span>

		<div class="container details">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'صفحه:', '_s' ), 'after' => '</div>' ) ); ?>
		</div>
	</article>