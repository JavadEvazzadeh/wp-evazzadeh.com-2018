<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="post-cover">

<div class="format-box">
<i class="icon-film"></i>
 </div>

	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'لینک مستقیم به %s', '_s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content( __( 'ادامه <span class="meta-nav">&larr;</span>', '_s' ) ); ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'صفحه:', '_s' ), 'after' => '</div>' ) ); ?>
		<hr />
		<p style="color: #ff0000;">به دلیل مشکلات مربوط به هاست و کمبود فضا و ترافیک ویدیوهام رو به آپارات منتقل کردم که در نتیجه اون کیفیت و حجم ویدیوها به حدود یک سوم فایل اصلی کاهش پیدا کرده. پس لطفا در صورت عدم نیاز به مشاهده با کیفیت بالا، از طریق لینک زیر ویدیو را <b>دانلود نکرده</b> و آنلاین روی آپارات مشاهده کنید!</p>
		<p style="text-align: center;">هم چنین شما از طریق <a href="http://www.aparat.com/mixa" title="ویدیوهای تیم میکسا در آپارات" target="_blank">صفحه میکسا در آپارات</a> می تونید تمام ویدیوهای من رو دنبال کنید.</p>
		<?php $video = SmartMetaBox::get('video_url'); ?>
		<div class="dlbutton">
		  <a href="<?php echo(SmartMetaBox::get('dlurl')); ?>" title="<?php echo(SmartMetaBox::get('dltitle')); ?>">دانلود کنید</a>
		  <p class="dltop"><?php echo(SmartMetaBox::get('dltitle')); ?></p>
		  <p class="dlbottom"><?php echo(SmartMetaBox::get('dlsize')); ?></p>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<span class="clock"> <i class="icon-time"></i><abbr title="<?php the_time('نوشته شده در j F Y؛ ساعت g:i a');?>"> <?php days_ago(); ?></abbr></span>
		<span class="comments-link"> <i class="icon-comment"></i>  <?php comments_popup_link( __( 'نظر شما چیست؟', '_s' ), __( 'یک دیدگاه', '_s' ), __( '% دیدگاه', '_s' ) ); ?></span>
		<span class="perml"> <i class="icon-bolt"></i> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'فقط درباره %s بخوانید', '_s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">لینک مستقیم</a></span>
	</footer><!-- #entry-meta -->
</div>	

</article><!-- #post-<?php the_ID(); ?> -->