  <footer>
   <section>
    <div id="social">
     <a target="_blank" id="soc-linkedin" href="http://ir.linkedin.com/in/evazzadeh/" title="رزومه جواد عوض زاده کاکرودی در لینکداین"><i class="fa fa-linkedin"></i></a>
     <a target="_blank" id="soc-instagram" href="http://instagram.com/evazzadeh" title="تصاویر جواد عوض زاده کاکرودی در اینستاگرام"><i class="fa fa-instagram"></i></a>
     <a target="_blank" id="soc-google" href="https://plus.google.com/+JavadEvazzadeh" title="پروفایل جواد عوض زاده کاکرودی در گوگل پلاس"><i class="fa fa-google-plus"></i></a>
     <a target="_blank" id="soc-facebook" href="http://facebook.com/j.evazzadeh" title="صفحه جواد عوض زاده کاکرودی در فیس بوک"><i class="fa fa-facebook"></i></a>
     <a target="_blank" id="soc-twitter" href="http://twitter.com/evazzadeh" title="توئیت های جواد عوض زاده کاکرودی"><i class="fa fa-twitter"></i></a>
    </div>
   </section>
   <div id="footer">
    <div id="footerbox" class="container">
     <div class="row">
      <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer') ) : else : ?><?php endif; ?>
     </div>
    </div>
    <div id="subfooter" class="row" >
     <div class="container">
      <p>استفاده از مطالب <a href="<?php bloginfo( 'url' ); ?>/" title="<?php bloginfo('name');?> | <?php bloginfo('description');?>">عوض زاده دات کام</a> فقط برای مقاصد غیر تجاری و با ذکر منبع منعی ندارد.
       <span class="english float-left"><a href="<?php bloginfo( 'url' ); ?>/" title="<?php bloginfo('name');?>">Evazzadeh.com</a><small>&copy; 2011-<?php echo date('Y');?></small></span>
      </p>
     </div>
    </div>
   </div>
  </footer>

 </div>


 <section>
  <div class="menu-outer">
   <div class="menu-icon">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
   </div>
   <nav>
    <div id="popup-nav">
<?php $menuParameters = array(
 'theme_location'  => 'popup',
 'echo'            => false,
 'items_wrap'      => '%3$s',
 'depth'           => 0,
); echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );?>
     <?php get_search_form() ?>
    </div>
   </nav>
  </div>
  <a class="menu-close" onClick="return true">
   <div class="menu-icon">
    <div class="bar"></div>
    <div class="bar"></div>
   </div>
  </a>
 </section>

 <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.0.js"></script>
 <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29692827-1', 'auto');
  ga('send', 'pageview');

 </script>
 </body>
</html>
