<div class="clear"></div>
	</div><!-- #main -->
	
<?php if(is_user_logged_in()) { ?>
<a id="nav-admin" href="<?php bloginfo('url'); echo "/wp-admin"; ?>" target="_blank" title="برای ورود به بخش مدیریت کلیک کنید"><img src="<?php bloginfo('template_directory'); echo"/img/navigate-admin.png"; ?>" alt="انتقال به پنل مدیریت" ></a>
<?php } ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="fcred">
			<a href="<?php bloginfo('siteurl'); ?>" title="تمام حقوق این وب سایت برای <?php bloginfo('name'); ?> ( <?php bloginfo('description'); ?> ) محفوظ است"><?php bloginfo('name'); ?></a> 
			<a href="http://www.Evazzadeh.com" title="Javad Evazzadeh"><abbr title="طراح جواد عوض زاده"><?php echo date('Y');?> &copy;</abbr></a><br />
			Publish in <a href="https://plus.google.com/+JavadEvazzadeh?rel=author">Google</a> by Javad Evazzadeh
			<!-- برخی از حقوق این طرح متعلق به جواد عوض زاده می باشد. لطفا نام طراح را تغییر ندهید www.Evazzadeh.com -->
		</div>
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

<nav id=quick><ul>
<li><abbr title="دسترسی سریع به بخش های گوناگون">دسترسی سریع</li>
<li><a target="_blank" href="<?php bloginfo('siteurl'); ?>" title="صفحه نخست وب سایت شخصی جواد عوض زاده">صفحه نخست</a></li>
<li><a target="_blank" href="http://saeed.evazzadeh.com" title="سعید عوض زاده">سعید عوض زاده</a></li>
<li><a target="_blank" href="http://h.evazzadeh.com" title="حبیبه عوض زاده | کارشناس ادبیات">حبیبه عوض زاده</a></li>
</ul></nav>
</body>
</html>