<?php
/*
 * Plugin Name: SA, OM, BH, AE, KW, QA States and Cities by Bakry Abdelsalam
 * Description: This plugin is designed to manage city dropdowns in checkout page.
 * Version: 1.0.0
 * Plugin URI: https://wa.me/201018745573/
 * Author URI: https://wa.me/201018745573/
 * Author: Bakry Abdelsalam
 * Text Domain: states-and-cities
 * Requires PHP: 5.5
 */

// Security 1
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

// Add aplugin notice to check for WC city Select as active plugin.
add_action( 'plugins_loaded', 'check_for_wc_city_select_active' );

function check_for_wc_city_select_active() {
    if( ! class_exists( 'WC_City_Select' ) ) {
        add_action( 'admin_notices', 'notice_wc_city_select_activate' );
        return;
    }

    add_filter( 'wc_city_select_cities', 'techiepress_my_cities' );
}

function notice_wc_city_select_activate() {
    $message = sprintf( __( 'States and cities for Woocommerce requires the <a href="%s">WC City Select</a> plugin to be active', 'states-and-cities-for-woocommerce' ), 'https://wordpress.org/plugins/wc-city-select/' );
    printf( '<div class="error notice-error notice is-dismissible"><p>%s</p></div>', $message );
}




function techiepress_my_cities( $cities ) {
// Cities for Saudi Arabia
    $cities['SA'] = array(
        "بقيق",
"عين دار",
"عنك",
"عواميه",
"بطحه",
"الظهران",
"الدمام",
"هويه/الدمام",
"الهفوف",
"حرض",
"الاحساء",
"جفر",
"الجبيل",
"الجش",
"خضريه",
"الخفجي",
"الخبر",
"المبرز",
"الموليجه",
"نبيه",
"النعيرية",
"عجم",
"العثمانيه",
"قرية العليا",
"قاره",
"القطيف",
"راس الخير",
"راس تنورة",
"رحمه",
"صفوى",
"الجبيل الصناعية 2",
"سيهات",
"سفنيه",
"سلوى",
"صراره",
"تنجيب",
"تاروت",
"ثقبا",
"الدهليه",
"العيون",
"العيص",
"ابو عريش",
"البدائع",
"الباحة",
"العيدابي",
"ابها",
"احد رفيده",
"عهد مصارحه",
"المدا",
"المخد",
"عمق",
"عقيق",
"العارضة",
"عسفان",
"الشقيق",
"اطولة",
"بدر الجنوب",
"بحرة الموجود",
"بريق",
"بدر",
"بيشة",
"بلحمر",
"بحرا",
"بلجرشي",
"بيش",
"بلقرن",
"بيرك",
"بللسمر",
"ضبا",
"دهبان",
"طهران الجنوب",
"دماد",
"درب",
"نجران",
"الوجه",
"وادي فاطمه",
"فرسان",
"جلوه",
"جازان",
"حالة عمار",
"الهرجه",
"الهدى",
"الحناكية",
"حقل",
"هويه/طائف",
"الجعرانه",
"جدة",
"الجموم",
"خيبر",
"خليص",
"خميس مشيط",
"خصاويه",
"الخرمة",
"كارا",
"كربوس",
"ليث",
"مكة المكرمة",
"مند",
"مستوره",
"مخوى",
"المدينة المنورة",
"مهد الدهب",
"المجاردة",
"محايل",
"مذلف",
"نماص",
"نمره",
"نعيريه",
"العلا",
"القحمة",
"القنفذة",
"رابغ",
"رانيا",
"رجال المع",
"صبيا",
"صامطة",
"سبت العليى",
"شميسي",
"الشعيبه",
"شرورة",
"سارت عبيده",
"الشريع",
"سبحيكا",
"تثليث",
"تنيوما",
"تيماء",
"طيبه",
"الطائف",
"تندحة",
"تريب",
"تربه",
"تبوك",
"ثول",
"املج",
"وديان",
"وادي بن حسبل",
"ينبع البحر",
"ينبع",
"ينبع النخيل",
"ذهبان",
"ذبيه",
"الادري",
"الشنانه",
"ابو عجرم",
"عفيف",
"افلج",
"الفويلق",
"الجوف",
"البترا",
"النافية",
"العامرية",
"النبهانية",
"المدراج",
"بقعة",
"النقرة",
"قيصومه",
"العرجة",
"الرديفه",
"الارطاوية",
"السليمانية",
"كبضه",
"الشملي",
"العاصية",
"عشيه",
"الطوير",
"عين فهيد",
"الخشيبي",
"باقة الشرقيه",
"البدائع",
"البكيرية",
"بريدة",
"ضرية",
"الدلم",
"ديراب",
"الدرمه",
"الدرعية",
"دومة الجندل",
"الدليميه",
"نصاب",
"الدوادمي ",
"القصيم",
"الغاط",
"غزالية",
"الحديثه",
"حائل",
"حفر الباطن",
"حريملاء",
"حوطة سدير",
"حريملاء",
"الحريق",
"حوطة بني تميم",
"حزم الجلاميد",
"جلاجل",
"موقق",
"كارا",
"منيفت القيد",
"خماسين",
"كحله",
"الخرج",
"اللقايط",
"ليلى",
"المجمعة",
"قصيباء",
"مرات",
"المذنب",
"مقيق",
"ضليع رشيد",
"المزاحمية",
"مذنب",
"سيميرا",
"روضه هباس",
"عيون الجوا",
"عنيزة",
"العيينة",
"ثرمادا",
"قصب",
"النبك ابو قصر",
"قفار",
"القويعية",
"عرعر",
"رفحاء",
"الرس",
"القرين",
"رياض الخبراء",
"رماح",
"الرياض",
"الرويضه",
"روضه سودير",
"سديان",
"ساجر",
"سلبوكه",
"شفا",
"شينانة",
"سحنه",
"شقراء",
"الشرائع",
"سكاكا",
"سقف",
"السليل",
"تنيوما",
"تبرجل",
"ثادق",
"تبراك",
"الاجفار",
"تمير",
"طريف",
"ام الجماجم",
"عقلة السكر",
"القريات",
"اشيقر",
"وادي الدواسر ",
"الوسيطاء",
"زلوم",
"الزلفي",
    );
    // Cities for Oman
    $cities['OM'] = array(
        "مسقط", "صلالة", "نزوى", "صور", "عبري", "صحار", "البريمي", "رستاق", "خصب"
    );

    // Cities for Bahrain
    $cities['BH'] = array(
        "المنامة", "المحرق", "الرفاع", "الحد", "عيسى", "حمد", "البديع"
    );

    // Cities for UAE
    $cities['AE'] = array(
        "أبو ظبي", "دبي", "الشارقة", "عجمان", "رأس الخيمة", "أم القيوين", "الفجيرة"
    );

    // Cities for Kuwait
    $cities['KW'] = array(
        "الكويت", "الفروانية", "الجهراء", "حولي", "الأحمدي", "مبارك الكبير"
    );

    // Cities for Qatar
    $cities['QA'] = array(
        "الدوحة", "الريان", "الخور", "الوكرة", "الشحانية", "أم صلال", "الزبارة"
    );

    
    return $cities;
}

function enqueue_admin_custom_script($hook)
{
    // Ensure this script is only loaded on the order create and edit pages
    if ('post-new.php' != $hook && 'post.php' != $hook) {
        return;
    }

    if ('shop_order' != get_post_type()) {
        return;
    }

    wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css');
    wp_enqueue_script('select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js', array('jquery'), '4.0.13', true);

    wp_enqueue_script('admin-custom-script', plugins_url('/js/admin-custom-script.js', __FILE__), array('jquery', 'select2-js'), '1.0', true);

    // Pass the cities to the script
    wp_localize_script('admin-custom-script', 'citiesData', techiepress_my_cities([]));

    // Enable select2 search functionality
    wp_add_inline_script('admin-custom-script', '
        jQuery(document).ready(function($) {
            $("#_shipping_city, #_billing_city").select2();
        });
        });
    ');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_custom_script');
