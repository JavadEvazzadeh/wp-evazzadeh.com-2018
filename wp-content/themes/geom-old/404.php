<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'اووپس! این صفحه وجود ندارد.', '_s' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'آدرس را دوباره چک کنید و یا از طریق لینک های زیر به مسیر مورد نظر خود بروید.', '_s' ); ?></p>
					
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

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary .site-content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>