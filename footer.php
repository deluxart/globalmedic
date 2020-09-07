<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage LevelUp
 * @since LevelUp 1.0
 */
$options = get_option( 'ember_theme_options' );
$options_modal = get_option( 'event_modal_options' ); 
?>

	</div><!-- .site-content -->

<footer id="footer">
    <div class="container">
        <div class="content">
            <div><?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('footer-1'); ?></div>
            <div><?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('footer-2'); ?></div>
            <div><?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('footer-3'); ?></div>
            <div><?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('footer-4'); ?></div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <p><?php pll_e('Copyright','Global'); ?></p>
        </div>
    </div>
</footer>



</div><!-- .site -->
<a class="button_scroll_top"></a>
<div class="search-open-bg"></div>
<div id="search-modal" class="search-open open-full">
    <div class="btnClose"></div>
    <div class="close-search"><svg class="icon icon--close"><use xlink:href="#icon-close"></use></svg></div>
    <div class="modalClose"></div>
    <div class="search-modal-inner">
        <p class="text-center">Введите слово, чтобы начать поиск</p>

    <div class="container search">
        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </div>
    </div>
</div>
<?php wp_footer(); ?>

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.sliderPro.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/copyright.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick_slides.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.shorten.js"></script>

        <script src="//code.jivosite.com/widget.js" data-jv-id="IdKBGDQITI" async></script>
        <script>
            jQuery('.text-doctor').shorten({
                moreText: 'Подробнее',
                lessText: 'Свернуть'
            });
        </script>

<!-- BEGIN JIVOSITE CODE {literal} -->
<!-- <script type='text/javascript'>
(function(){ var widget_id = 'AriDIruX7B';var d=document;var w=window;function l(){
  var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
  s.src = '//code.jivosite.com/script/widget/'+widget_id
    ; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
  if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
  else{w.addEventListener('load',l,false);}}})();
</script> -->
<!-- {/literal} END JIVOSITE CODE -->

<!-- <script src="https://mssg.me/widget/embermedic.com" async></script> -->

<?php if ( $options_modal['ativate_event_modal'] == 1) { ?>
<!-- Модальное окно мероприятия -->
<div class="event_modal <?php echo $options_modal['modal_delay']; ?>" style="background: url(<?php echo $options_modal['background_url'];?>) center no-repeat; background-size: cover;">
    <div class="cont">
        <div><img src="<?php echo $options_modal['image_url'];?>" alt=""></div>
        <div class="content">
            <h4><?php echo $options_modal['event_modal_title']; ?></h4>
            <?php if ( $options_modal['ativate_event_date_modal'] == 1) { ?>
            <div class="date-block">
                <div><strong><?php echo $options_modal['event_date']; ?></strong><?php echo $options_modal['event_location']; ?></div>
                <div class="date-icon"><img src="https://globalmedik.com/wp-content/uploads/2019/12/event-date-and-time-symbol.svg" alt=""></div>
            </div>
            <?php } ?>
            <div class="feed-form">
                <?php echo do_shortcode( wp_unslash($options_modal['contact_form']) ); ?>
            </div>
        </div>
    </div>

    <div id="setCookie" class="close-icon">
        <img src="https://globalmedik.com/wp-content/uploads/2019/12/cancel-1.svg" alt="">
    </div>
</div>
<div class="event_modal-bg"></div>
<style>
    .event_modal .cont>div>div.feed-form .form input[type=submit] { background: <?php echo $options_modal['button_color']; ?> !important; }
    .event_modal .cont>div.content a { color: <?php echo $options_modal['link_color']; ?> !important; }
    .event_modal .cont > div > div.feed-form .form .ajax-loader { background-color: <?php echo $options_modal['link_color']; ?> !important; }
    <?php echo $options_modal['modal_styles']; ?>
</style>
<script>
jQuery(document).ready(function(){
    jQuery(".event_modal .close-icon").click(function () {
    jQuery.cookie("popup-event", "", { expires:1, path: '/' });

            jQuery('.event_modal').removeClass("open");
            setTimeout(function(){
                 jQuery('.event_modal').hide();
            }, 100);
            jQuery('.event_modal-bg').removeClass("open");
            jQuery('.event_modal-bg').css({display: 'none'});

    });

    if ( jQuery.cookie("popup-event") == null )
    {
    setTimeout(function(){

            jQuery('.event_modal').show();
            setTimeout(function(){
                 jQuery('.event_modal').addClass("open");
            }, 200);
            jQuery('.event_modal-bg').fadeIn().addClass("open").css({display: 'block'});

    }, <?php echo $options_modal['modal_delay'] = $options_modal['modal_delay'] * 1000; ?>)
    }
    else {
      jQuery(".event_modal").hide();
    }
});
</script>
<!-- Модальное окно мероприятия -->
<?php } ?>


</body>
</html>
