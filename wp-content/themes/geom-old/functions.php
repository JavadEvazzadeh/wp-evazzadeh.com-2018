<?php
require_once('class-tgm-plugin-activation.php');
include ( 'getplugins.php' );
include ( 'aq_resizer.php' );
include ( 'guide.php' );
include ( 'metabox_class.php' );

add_smart_meta_box('smart_meta_box_demo', array(
'title'     => 'تنظیمات قالب بندی پست',
'pages'		=> array('post'),
'context'   => 'normal',
'priority'  => 'high',
'fields'    => array(

array(
'name' => 'عنوان دانلود',
'id' => 'dltitle',
'default' => 'عوض زاده دات کام',
'desc' => '<br />این عنوان هنگام رفتن موس روی گزینه دانلود در کادر بالایی ظاهر می شود',
'type' => 'text',
),

array(
'name' => 'آدرس لینک دانلود',
'id' => 'dlurl',
'default' => '/',
'desc' => '<br />آدرس کامل لینک مورد نظر برای دانلود را در این بخش وارد نمایید',
'type' => 'text',
),

array(
'name' => 'آدرس فیلم ضمیمه شده',
'id' => 'video_url',
'default' => '',
'desc' => '<br />آدرس ویدیوی ضیمیه شده را برای در صورت وجود برای نوشته های از نوع فیلم وارد نمایید.',
'type' => 'text',
),

array(
'name' => 'آدرس صدای ضمیمه شده',
'id' => 'audio_url',
'default' => '',
'desc' => '<br />آدرس صدای ذخیره شده را برای نوشته های از نوع صدا وارد نمایید.',
'type' => 'text',
),

array(
'name' => 'اندازه بر اساس مگابایت',
'id' => 'dlsize',
'default' => '-- مگابایت',
'desc' => '<br />حجم لینک دانلود را وارد نمایید. برای نمایش در زیر لینک دانلود در هنگام رفتن موس روی آن',
'type' => 'text',
),

)
));

/* Add post formats */
add_theme_support( 'post-formats', array( 'video','gallery','audio','link','image','quote','aside','chat','status' ) );



@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');


function create_dl_button($atts, $content=null) {
 extract(shortcode_atts( array('url' => SmartMetaBox::get('dlurl'), 'title' => SmartMetaBox::get('dltitle'), 'size' => SmartMetaBox::get('dlsize')), $atts)); 
// return '<a href="http://' . $dlurl . '.evazzadeh.com">DL</a>';
 
 return '<div class="dlbutton"><a href="' . $url . '" title="' . $title . '">دانلود کنید</a><p class="dltop">' . $title . '</p><p class="dlbottom">' . $size . '</p></div>';
}
add_shortcode('dl', 'create_dl_button');



/* Load scripts */

function lod_scripts() {
	global $post;

	//wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'fontwaesome', get_template_directory_uri() . '/font-awesome.css');
	//wp_enqueue_style( 'fontwaesome-ie', get_template_directory_uri() . '/font-awesome-ie7.css');
	wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
	
	wp_enqueue_script('thickbox', null,  array('jquery'));
	wp_enqueue_script( 'jwplayer', get_template_directory_uri() . '/js/jwplayer.js', array( 'jquery' ), true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '20120206', true );

//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}


}
add_action( 'wp_enqueue_scripts', 'lod_scripts' );


/* Set content width */

if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */


/**
 * Add default posts and comments RSS feed links to head
*/
 
//add_theme_support( 'automatic-feed-links' );
	
	
/* SIDEBARS */
if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	));




/* CUSTOM MENUS */	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	


/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );

}



/* PAGE NAVIGATION */

function getpagenavi(){
	?>
	<div id="navigation" class="clearfix">
	<?php if(function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi() ?>
	<?php else : ?>
	        <div class="alignright"><?php next_posts_link(__('&laquo; نوشته های قدیمی تر','web2feeel')) ?></div>
	        <div class="alignleft"><?php previous_posts_link(__('نوشته های جدیدتر &raquo;','web2feel')) ?></div>
	        <div class="clear"></div>
	<?php endif; ?>

	</div>

	<?php
	}

/* Days ago */

function days_ago() {
	$days = round((date('U') - get_the_time('U')) / (60*60*24));
	if ($days==0) {
		echo "امروز"; 
	}
	elseif ($days==1) {
		echo "دیروز";
	}
	else {
		echo "" . $days . " روز پیش";
	}
}	




if ( ! function_exists( '_s_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since _s 1.0
 */
function _s_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', '_s' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(ویرایش)', '_s' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<abbr title="<?php echo(comment_author_IP( $comment->comment_ID )); ?>"><?php echo get_avatar( $comment, 60 ); ?></abbr>
					<?php printf( __( '%s ', '_s' ), sprintf( '<cite class="fn">%s</cite> در ', get_comment_author_link() ) ); ?>
					
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
					<time pubdate datetime="<?php echo(get_comment_date().' ساعت'.get_comment_time()); ?>"><?php echo(get_comment_date('j F Y').get_comment_time('؛ ساعت g:i a')); ?></time></a>
					<span class="says">گفته:</span>
					<?php edit_comment_link(  '(ویرایش)', ' ' ); ?>
					
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( '<mark>دیدگاه شما در انتظار تایید مدیریت است.</mark>', '_s' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for _s_comment()

if ( ! function_exists( '_s_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since _s 1.0
 */
function _s_posted_on() {
	printf( __( 'ارسال شده در <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> توسط <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', '_s' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'نمایش تمام نوشته های %s', '_s' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;
		
		

/**
 * Returns true if a blog has more than 1 category
 *
 * @since _s 1.0
 */
function _s_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so _s_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so _s_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in _s_categorized_blog
 *
 * @since _s 1.0
 */
function _s_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', '_s_category_transient_flusher' );
add_action( 'save_post', '_s_category_transient_flusher' );	



function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
return $protocol."://".$_SERVER['SERVER_NAME'].$port.$uri;
}

/*---------------------------------------------------------------Basic EvazzadehSettings Settings------------------------- */
// change wordpress admin footer page
function remove_footer_admin ()
{ echo "به پنل مديريت <a href='"; bloginfo('url'); echo"' Title='"; bloginfo('description'); echo"'>"; bloginfo('name'); echo"</a> خوش آمديد | طراحي و توسعه داده شده توسط <a href='http://www.Javad.Evazzadeh.com' Title='Javad Evazzadeh Kakroudi'>جواد عوض زاده &copy;</a>";}
add_filter('admin_footer_text', 'remove_footer_admin');

// change wordpress logo
function custom_loginlogo() {echo '<style type="text/css">h1 a {background-image: url('.get_bloginfo('template_directory').'/img/logo-intro.png) !important; }</style>';}
add_action('login_head', 'custom_loginlogo');

// change wordpress logo url
function wpc_url_login(){return "http://www.Serena.ir";}
add_filter('login_headerurl', 'wpc_url_login');

// hide update message for editors
add_action( 'admin_init', 'hide_update_msg', 1 );
function hide_update_msg(){! current_user_can( 'install_plugins' ) and remove_action( 'admin_notices', 'update_nag', 3 );}


/*-----------------------------------------------------------------------------Dashboard Settings------------------------- */
// show theme information on dashboard
function wpc_dashboard_widget_function() {
	echo "<ul>
	<li>زمان انتشار: آبان ماه 1391</li>
	<li>منتشر کننده: <a href='http://www.Evazzadeh.com' title='Javad Evazzadeh Kakroudi'>جواد عوض زاده</a></li>
	<li>پشتیبان هاست: <a href='http://www.Serena.ir' title='Serena گروه هاستینگ'>Serena Server</a></li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'اطلاعات فنی پوسته', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

// hide unused metabox from wordpress dashboard
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;

// Remove the quickpress widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
// Right Now
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
// recent drafts
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
// recent comments
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
// Wordpress News	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
// Wordpress weblog
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	
}
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');


/*-------------------------------------------------------------------------Security Settings------------------------------ 
// remove error mesages from wordpress login page for security reason
add_filter('login_errors', create_function('$a', "return null;"));

// remove theme edit from theme option tab
function remove_editor_menu() { remove_action('admin_menu', '_add_themes_utility_last', 101); }
add_action('_admin_menu', 'remove_editor_menu', 1);

/*-----------------------------------------------------------------------Improve Performance Settings-------------------- 
// remove unused information from header
add_action('init', 'remheadlink');
function remheadlink()
{
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
}

// Remove rel category for html5 comptability
add_filter( 'the_category', 'add_nofollow_cat' );
function add_nofollow_cat( $text ){$text = str_replace('rel="category tag"', "", $text); return $text;}

// make clickable links in content
add_filter( 'the_content', 'make_clickable', 12);
add_filter( 'the_content', 'make_clickable', 9);

// show helpful information on post title
function title_text_input( $title ){
    $title = array(
					"عناوين جذاب؛ بازديدکننده بيشتر؛ سايتي بهتر!",
					"عناوين کوتاه، گويا و شفاف انتخاب کنيد",
					"با گروه Serena به دوستان خود به ما کمک کنيد",
					"کلمات کليدي را فراموش نکنيد؛ کلمه کليدي مناسب محتوا برگزينيد",
					"دسته ها را با دفت بيشتر انتخاب کنيد",
					"قبل از قرار دادن تصاوير آن ها را فشرده سازي نماييد",
					);
	$title = $title[array_rand($title)];
	return $title;
}add_filter('enter_title_here','title_text_input');