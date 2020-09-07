<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage LevelUp
 * @since LevelUp 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="ru-RU" prefix="og: http://ogp.me/ns#" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="ru-RU" prefix="og: http://ogp.me/ns#" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="ru-RU" prefix="og: http://ogp.me/ns#" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0,  user-scalable=no">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <link rel="stylesheet preload" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css"> -->
    <link rel="stylesheet preload" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css">
    <link rel='stylesheet' id='google-fonts-style-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400%2C400italic%2C600%2C600italic%2C700%2C300%7CWork+Sans%3A400%2C300%2C600%7CRoboto%3A300%2C400%2C400italic%2C500%2C500italic%2C700%2C900%2C600&#038;ver=9.6' type='text/css' media='all' />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css?<?php echo date(get_option('date_format')); ?>">
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/all.min.css"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/td-multipurpose.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/typicons.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slider-pro.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/menu-ember.css?<?php echo date(get_option('date_format')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/geometria/stylesheet.css?<?php echo date(get_option('date_format')); ?>">
    <meta http-equiv="Cache-Control" content="no-cache">

    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
        <!-- Стили для новосй страниы - Alexander O. -->
    <?php wp_head(); ?> 

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/search-form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.min.css">

    <?php if( is_single( $post ) ){ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style-editor-theme.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style-editor.css?<?php echo date(get_option('date_format')); ?>">
    <?php } ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146137387-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146137387-1');
</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '225691831789032'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=225691831789032&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
	
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '749064302233679');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?..."
/></noscript>
<!-- End Facebook Pixel Code -->
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NMFWZ2F');</script>
<!-- End Google Tag Manager -->
	
	
	
	
	<!-- Hotjar Tracking Code for https://globalmedik.com/ --> <script> (function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:1601580,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?...'); </script>
	
	
	
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMFWZ2F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v4.0&appId=1047774598635397"></script>
    <div class="black-bg"></div>
<svg class="hidden">
            <symbol id="icon-menu" viewBox="0 0 119 25">
                <title>menu</title>
                <path d="M36,8 L36,0 L100,0 L100,8 L36,8 Z M0,8 L0,0 L24,0 L24,8 L0,8 Z M0,28 L0,20 L71,20 L71,28 L0,28 Z"/>
            </symbol>
            <symbol id="icon-close" viewBox="0 0 24 24">
                <title>close</title>
                <path d="M24 1.485L22.515 0 12 10.515 1.485 0 0 1.485 10.515 12 0 22.515 1.485 24 12 13.484 22.515 24 24 22.515 13.484 12z"/>
            </symbol>
        </svg>
<div>
<div>
<?php $options = get_option( 'ember_theme_options' ); ?>





    <header id="header">
        <div class="top">
            <div class="container">
                <div class="content">
                    <div></div>
                    <div>
                        <ul class="socials">
                        	<li class="phone"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/phone.svg" alt="Phone" /><span><a href="tel:<?php echo $options['phone_2'];?>"><?php echo $options['phone_2'];?></a></span></li>
                            <li class="fb"><a href="<?php echo $options['fb'];?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook.svg" alt="Fb" /></a></li>
                            <li class="in"><a href="<?php echo $options[in];?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/instagram.svg" alt="Instagram" /></a></li>
                            <li class="icon_viber"><a href="viber://chat?number=<?php echo $options['phone_2'];?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/viber.svg" alt="Viber" /></a></li>
                            <li class="icon_whatsapp"><a href="whatsapp://chat?number=<?php echo $options['phone_2'];?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/whatsapp.svg" alt="WhatsApp" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle">
            <div class="container">
                <div class="content">
                    <div class="logo">
                        <?php if( is_front_page()) { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/gm_logo.svg" alt="">
                        <?php } else { ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/gm_logo.svg" alt=""></a>
                        <?php } ?>
                    </div>
                    <div class="phone">
                        <a class="<?php pll_e('popmake-obratnyj-zvonok','Global'); ?> call-btn btn"><i class="fas fa-phone" aria-hidden="true"></i><span><?php pll_e('Call_back','Global'); ?></span></a>
                    </div>
                    <div>
     <div class="menu-ember">
        <ul>
           <?php
            wp_nav_menu( array(
                'menu'            => '2',
                'container'       => false,
                'echo'            => false,
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'echo'            => true,
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'walker'          => '',
                  'walker_nav_menu_start_el'          => '',
            ) );
            ?>
        </ul>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="breadcrumbs-block">
    <div class="container">
        <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
    </div>
</div>
    <div>
