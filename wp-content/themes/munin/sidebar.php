<aside>
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <nav>
            <div class="sidebar-nav">
                <h2 class="sidebar-brand"><a href="<?php bloginfo( 'url' ); ?>/blog/"><?php bloginfo('name'); ?></a></h2>
                <?php get_search_form() ?>
                <div class="sidebar-items">

                  <?php $menuParameters = array(
                    'theme_location'  => 'sidebar',
                    'echo'            => false,
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                  ); echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );?>
                  <?php if(is_user_logged_in()) { ?>
                  <a id="admin-nav" href="<?php bloginfo('url'); echo "/wp-admin"; ?>" target="_blank" title="برای ورود به بخش مدیریت کلیک کنید">پنل مدیریت</a>
                  <?php } ?>
                    <div>
                      <a id="donate-nav" href="<?php bloginfo('url'); echo "/donate"; ?>" target="_blank" title="آیا مطالب این سایت برای شما مفید بوده؟">حمایت مالی</a>
<?php echo create_donate() ?>
                    </div>
                  </div>
            </div>
        </nav>

        <a href="#menu-toggle"  id="menu-toggle">
            <div class="mymenu">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </div>
        </a>
        <div id="motto"></div>
    </div>
    <!-- /#sidebar-wrapper -->
</aside>