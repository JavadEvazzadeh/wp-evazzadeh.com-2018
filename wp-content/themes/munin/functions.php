<?php
// include ( 'aq_resizer.php' );
include ( 'metabox_class.php' );

add_smart_meta_box('smart_meta_box_demo', array(
'title'     => 'تنظیمات قالب بندی پست',
'pages'     => array('post'),
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
'default' => '#',
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



/* SIDEBARS */
if ( function_exists('register_sidebar') )

    register_sidebar(array(
    'name' => 'Footer',
    'before_widget' => '<div class="span4">',
    'after_widget' => '</div></div>',
    'before_title' => '<h3>',
    'after_title' => '</h3><div class="info">',
    'description'=>'Maximum 3 Widget'
    ));


/* CUSTOM MENUS */
register_nav_menus( array(
        'primary' => __( 'Primary Navigation', '' ),
        'sidebar' => __( 'Secondary Navigation | sidebar', '' ),
        'popup' => __( 'third Navigation |popup', '' ),
    ) );

/* Add post formats */
add_theme_support( 'post-formats', array( 'video','gallery','audio','link','image','quote','aside','chat','status' ) );
// exclude_from_search => true
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_theme_support( 'post-thumbnails' );


function excerpt_read_more_link($output) {
 global $post;
 return $output . '<a class="more-link" href="'. get_permalink($post->ID) . '"> در ادامه بخوانید<span>&larr;</span></a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<a class="more-link" title="ادامه مطلب و دسترسی مستقیم به '.the_title_attribute('echo=0').'" href="' . get_permalink() . '" rel="bookmark" >ادامه دارد <span class="meta-nav">&raquo;&raquo;&raquo;</span></a>';
}





function bg_recent_comments($no_comments = 3, $comment_len = 500, $avatar_size = 160) {
    $comments_query = new WP_Comment_Query();
    $comments = $comments_query->query( array( 'number' => $no_comments ) );
    $comm = '';
    if ( $comments ) : foreach ( $comments as $comment ) :

        $comm .= '<div class="cd-timeline-block"><div class="cd-timeline-img bounce-in">';
        $comm .= '<a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
        $comm .= get_avatar( $comment->comment_author_email, $avatar_size );
        $comm .= '</a> ';
        $comm .= '</div> <div class="cd-timeline-content bounce-in">';
        $comm .= get_comment_author( $comment->comment_ID ) . '</a> ';

        $comm .= '<p>' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '...</p>';
        $comm .= '</div></div>';

    endforeach; else :
        $comm .= 'No comments.';
    endif;
    echo $comm;
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
    <li class="pingback">
        <p><?php
             echo( 'این نوشته در مطلبی با عنوان ' );
             comment_author_link();
             echo( ' منتشر شده است' );
             edit_comment_link( __( '(ویرایش)', '_s' ), ' ' );
         ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); echo 'id="comment-'.$comment->comment_ID.'"';?> >
        <article class="comment">
            <div class="row">
                <div class="span3">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" title="<?php echo(comment_author_IP( $comment->comment_ID )); ?>" ><?php echo get_avatar( $comment, 160);?></a>
                </div>
                <div class="span9">
                    <div class="comment-meta">
                        <span class="author-name"><?php echo(get_comment_author_link());?></span>
                        <span class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
                        <time pubdate datetime="<?php echo(get_comment_date().' @ '.get_comment_time()); ?>"><?php echo(get_comment_date('j F Y').get_comment_time(' @ g:i a')); ?></time>
                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( '<mark>دیدگاه شما در انتظار تایید مدیریت است.</mark>', '_s' ); ?></em>
                    <?php endif; ?>
                    <div class="comment-content"><?php comment_text(); ?></div>
                    <?php edit_comment_link(  '(ویرایش)', ' ' ); ?>
                </div>

            </div>
        </article>

    <?php
            break;
    endswitch;
}
endif; // ends check for _s_comment()









// ---------------------------------------------------------------- Used in theme

function create_dl_button($atts, $content=null)
{
     extract(shortcode_atts( array('url' => SmartMetaBox::get('dlurl'), 'title' => SmartMetaBox::get('dltitle'), 'size' => SmartMetaBox::get('dlsize')), $atts));
    // return '<a href="http://' . $dlurl . '.evazzadeh.com">DL</a>';
     return '<div class="dlbutton"><a href="' . $url . '" title="' . $title . '">دانلود کنید</a><p class="dltop">' . $title . '</p><p class="dlbottom">' . $size . '</p></div>';
}
add_shortcode('dl', 'create_dl_button');


function create_donate()
{
    $donate_txt ='
    <form method="post" class="donate-box">
      <div class="price">
        <input type="number" name="price" min="1" value="1" placeholder="مقدار" autocomplete="off"/>
        <label for="price">هزار تومان</label>
      </div>
      <input type="submit" name="PayRequestSubmit" value="این هم کمک من!" class="btn" title="پیشاپیش از حمایت شما سپاسگذاری میکنم"/>
    </form>
    ';

    return $donate_txt;

}
add_shortcode('donate', 'create_donate');


function donate_submit()
{
    // if user send pay request on each page,
    if (isset($_POST['PayRequestSubmit']) && isset($_POST['price']))
    {
        // if price sended is correct
        $price = $_POST['price'];
        if(is_numeric($price) && $price > 0 && $price == round($price, 0))
        {
            $price *= 1000;

            if (isset($_POST['PayRequestSubmit'])) {
                $MerchantID = "9ac0d256-c4cf-11e5-9460-000c295eb8fc"; //Required
                $Amount = $price; //Amount will be based on Toman  - Required
                $Description = 'Donate'; // Required
                // $Email = 'UserEmail@Mail.Com'; // Optional
                // $Mobile = '09123456789'; // Optional
                // $CallbackURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; // Required
                $CallbackURL = 'http://evazzadeh.com/donate/thanks'; // Required

                try {
                    $client = @new soapclient('https://de.zarinpal.com/pg/services/WebGate/wsdl');
                    $result = $client->PaymentRequest(
                        array(
                            'MerchantID'  => $MerchantID,
                            'Amount'      => $Amount,
                            'Description' => $Description,
                            // 'Email'       => $Email,
                            // 'Mobile'      => $Mobile,
                            'CallbackURL' => $CallbackURL,
                        ));
                    //Redirect to URL You can do it also by creating a form
                    switch ($result->Status) {
                        case -1:
                            $ERR = 'اطلاعات ارسال شده ناقص می باشد';
                            break;
                        case -2:
                            $ERR = 'ادرس IP و یا مرچنت کد به صورت صحیح وارد نشده';
                            break;
                        case -3:
                            $ERR = 'حداقل مبلغ قابل پرداخت 100 تومان می باشد';
                            break;
                        case -4:
                            $ERR = 'سطح تایید پذیرنده پایین تر از سطح نقره ای است';
                            break;
                        default:
                            $ERR = 'کد خطا : ' . $result->Status;
                    }
                    if ($result->Status == 100)
                    {
                        echo '<html><head>';
                        echo '<meta charset="utf-8">';
                        echo '<style type="text/css">body {background-color: #ffffff;background-attachment: fixed;background-repeat: repeat;font-size:12px;font-family:lato;text-align:center;line-height:14px;text-transform:none;color:#E0E0E0;}#main{position:fixed;height:494px;width:650px;top:50%;margin-top:-100px;left:50%;margin-left:-325px;font-size:50px;line-height:59px;}a{display:block;text-decoration:none;color:#a3a3a3;-webkit-transition: all 0.4s linear;-moz-transition: all 0.4s linear;transition: all 0.4s linear;}a:link, a:active, a:visited{color: #a3a3a3;padding-bottom:5px;border-bottom:2px solid #a3a3a3;}a:hover{color: #a3a3a3;}.smaller{font-size:20px;}</style>';
                        echo '</head></body>';
                        echo ' <div id="main">';
                        echo '  <a>REDIRECTING YOU</a>';
                        echo '  <span class="smaller">to Bank Gateway</span><br>';
                        echo ' </div>';

                        echo '<script type="text/javascript">window.location = "https://www.zarinpal.com/pg/StartPay/' . $result->Authority . '";</script>';
                        echo '</body></html>';
                        exit();

                    }
                    else
                    {
                        // echo '<div id="flashMessage" class="error-msg"> کد خطا  : ' . $result->Status . '<br>علت خطا : ' . $ERR . '</div>';
                        echo '<div id="flashMessage" class="error-msg">علت خطا : ' . $ERR . '</div>';
                    }
                } catch (SoapFault $e) {
                    echo '<div class="error">خطا در فراخوانی وب‌سرويس.</div>';
                }
            }


        }
    }
    // else if (isset($_POST['Authority']) && isset($_POST['Status']))
    elseif(isset($_GET['Authority']) && isset($_GET['Status']))
    {
        // if pay not happend return to donate page!
        $callbackStatus = $_GET['Status'];
        if($callbackStatus == "NOK")
        {
            $newLocation = 'http://evazzadeh.com/donate?status=faild';
            header('Pragma: no-cache');
            header("HTTP/1.1 301 Moved Permanently");
            header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            header('Location: '.$newLocation);
            exit();
        }


    }
}
donate_submit();


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

function mytheme_remove_img_dimensions($html) {
  $html = preg_replace('/(width|height)=["\']\d*["\']\s?/', "", $html);
    return $html;
}
// add_filter('post_thumbnail_html', 'mytheme_remove_img_dimensions', 10);
// add_filter('the_content', 'mytheme_remove_img_dimensions', 10);
add_filter('get_avatar','mytheme_remove_img_dimensions', 10);



/*---------------------------------------------------------------Basic EvazzadehSettings Settings------------------------- */
// change wordpress admin footer page
function remove_footer_admin ()
{ echo "طراحی و توسعه داده شده توسط <a href='http://Evazzadeh.com' Title='Javad Evazzadeh Kakroudi'>جواد عوض زاده &copy;</a>";}
add_filter('admin_footer_text', 'remove_footer_admin');

/*-----------------------------------------------------------------------------Dashboard Settings------------------------- */
// show theme information on dashboard
function wpc_dashboard_widget_function() {
    echo "<ul>
    <li>زمان انتشار: مهر ماه 1393</li>
    <li>منتشر کننده: <a href='http://Evazzadeh.com' title='Javad Evazzadeh Kakroudi'>جواد عوض زاده</a></li>
    <li>پشتیبان هاست: <a href='http://Serena.ir' title='Serena گروه هاستینگ'>Serena Server</a></li>
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
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
// Plugins
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
// Right Now
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
// recent drafts
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
// recent comments
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
// Wordpress News
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
// Wordpress weblog
    // unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');

function related_post($_count = 7)
{
    echo '<nav class="relatedposts">';
    echo '<h3>در همین رابطه بخوانید</h3>';

    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
     
    if ($tags)
    {
        $tag_ids = array();
        foreach($tags as $individual_tag) 
        {
            $tag_ids[] = $individual_tag->term_id;
        }
        $args = array
        (
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=>$_count, // Number of related posts to display.
            'caller_get_posts'=>1
        );
     
        $my_query = new wp_query( $args );
     
        while( $my_query->have_posts() )
        {
            $my_query->the_post();
?>
            <a rel="external" href="<?php the_permalink() ?>" title="لینک مستقیم به <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
<?php
        }
    }
    $post = $orig_post;
    wp_reset_query();
    echo '</nav>';

}









?>