<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'چیزی یافت نشد', '_s' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_home() ) { ?>

			<p><?php printf( __( 'آماده انتشار نخستین نوشته خود هستید؟ <a href="%1$s">از اینجا شروع کنید</a>.', '_s' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php } elseif ( is_search() ) { ?>

			<p><?php _e( 'متاسفیم، هیچ شباهتی بین جستجوی شما و محتویات این وب سایت وجود ندارد. لطفا دوباره با کلمات مناسب تر بررسی نمایید.', '_s' ); ?></p>
			<?php get_search_form(); ?>

		<?php } else { ?>

			<p><?php _e( 'متاسفانه ما نتوانستیم شما رو به هدف برسانیم. شاید جستجو در وب سایت به کمک شما بیاید.', '_s' ); ?></p>

			
			
			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widgettitle"><?php _e( 'دسته های کاربردی', 'toolbox' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 'TRUE', 'title_li' => '', 'number' => '10' ) ); ?>
						</ul>
					</div>

					<?php
					$archive_content = '<p>' . sprintf( __( 'در بین آرشیوها جستجو کنید', 'toolbox' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

		<?php } ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->
