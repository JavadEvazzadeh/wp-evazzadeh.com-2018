<?php
/**
 * @package Hello_thinker
 * @version 1.0
 */
/*
Plugin Name: Hello_thinker
Plugin URI: http://wordpress.org/extend/plugins/hello-thinker/
Description: نمایش تصادفی سخن اندیشمندان در بالای تمام صغحات مدیریت وب سایت
Author: Javad Evazzadeh
Version: 1.0
Author URI: http://www.Javad.Evazzadeh.com/
*/

function hello_thinker_get_lyric() {
	/** These are the lyrics to Hello thinker */
	$lyrics = "
اميد، نان روزانه آدمي است . رابيندرانات تاگور
اميد قوه محرک زندگي است. ساموئل اسمايلز 
اميد همچون خون در روان آدميست که اگر نباشد گامي به پيش نمي رود و اگر باشد جهاني را دگرگون مي سازد . ارد بزرگ
اميد با مرگ هم به گور نمي رود . فردريک شيلر
اميد نصف خوشبختي است. ضرب المثل ترکي 
اميد ، آهستگي و ملايمت زندگي را روشن و شيرين مي کند ، خشم و تيزي مايه رنج و بلاست . آهسته رو از عيبجوي مي گريزد و شرم و آهستگي را دوست مي دارد . بزرگمهر بختگان
انسان نمي تواند به گونه اي مستقيم حوادث زندگي خودش را انتخاب كند، ولي مي تواند افكار خود را انتخاب كند و با اين عمل به طور غير مستقيم، شكل حوادث زندگي خود را تعيين نمايدجيمز آلن
وقتي زن مزه عشق را چشيد، ديگر دوستي به مذاقش خوش نمي آيد.لاروشفوكو
عشق وقتي به سر وقت پيران مي رود، آنها را جوان مي كند.برناردشاو
عاشق محبوبش را مظهر تمام چيزهاي برگزيده و نيكو مي بيند و بتدريج، دايره عشق او از پرستش زيبايي در يك وجود تجاوز كرده، پرستش همه مظاهر طبيعت را آغاز مي كند.
آن اندازه كه ما خود را فريب مي دهيم و گمراه مي كنيم، هيچ دشمني نمي تواند.محمد حجازي
اگر نمي تواني دوست پيدا كني، براي خود دشمن نتراش.مثل يوناني
اگر مي خواهي رازي را از دشمنان پنهان بداري، آن را هرگز به دوستانت فاش مكن.بنجامين فرانكلين
انسان نمي تواند به همه نيکي کند، ولي مي تواند نيکي را به همه نشان دهد. رولن
کار ريشه هاي تلخ و ميوه شيرين دارد. ضرب المثل آلماني
به همه عشق بورز، به تعداد کمي اعتماد کن، و به هيچکس بدي نکن. شکسپير
کشوري که داراي پيشوايي بي باک است همه مردمش قهرمان و دلير مي شوند . حکيم ارد بزرگ
";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_thinker() {
	$chosen = hello_thinker_get_lyric();
	echo "<p id='thinker'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_thinker' );

// We need some CSS to position the paragraph
function thinker_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#thinker {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'thinker_css' );

?>
