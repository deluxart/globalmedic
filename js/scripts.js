jQuery( document ).ready(function( $ ) {
        jQuery( '.medic-slider' ).sliderPro({
            width: "100%",
            autoHeight: true,
            fade: true,
            arrows: true,
            buttons: false,
            fullScreen: true,
            shuffle: true,
            smallSize: 500,
            mediumSize: 1000,
            largeSize: 3000,
            thumbnailArrows: true,
            autoplay: false
        });
    });


jQuery('[data-fancybox="images"]').fancybox({
    thumbs: {
        autoStart: true
    },
    buttons: [
        'zoom',
        'slideShow',
        'fullScreen',
        'thumbs',
        //'download',
        //'zoom',
        'close'
    ]
});

// Add btn Scroll to top
var btn_scroll_top = jQuery('.button_scroll_top');
jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn_scroll_top.addClass('show');
  } else {
    btn_scroll_top.removeClass('show');
  }
});

btn_scroll_top.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});


// Поиск
    jQuery('.search-open-btn').click(function () {
        jQuery('.search-open').toggleClass("open");
        // jQuery('.search-open input').focus();
        jQuery('.search-open-bg').toggleClass("open").css({display: 'block'});
    });
    jQuery('#search-modal .btnClose, #search-modal .modalClose, .icon--close').click(function () {
        jQuery('.search-open').toggleClass("open");
        jQuery('.search-open-bg').toggleClass("open");
        jQuery('.orig').val('');
        jQuery('.search-open-bg').css({display: 'none'});
    });


    jQuery('ul.foot > li.search a').click(function () {
        jQuery('.search-open').toggleClass("open");
        // jQuery('.search-open input').focus();
        jQuery('.search-open-bg').toggleClass("open").css({display: 'block'});
    });
    
// Конец - Поиск
jQuery('.tg-item-excerpt').each(function() {
    const e = jQuery(this);
    const fix = e.html().replace('�', "");
    e.html(fix);
});



jQuery('#search-sec .content').click(function(e) {
    jQuery('.black-bg').toggleClass('active');
    jQuery('#search-sec .content').toggleClass('active');
    jQuery(".orig").focus();
    e.preventDefault();
});

jQuery('.black-bg').click(function(e) {
    jQuery(this).removeClass('active');
    jQuery('#search-sec .content').removeClass('active');
    e.preventDefault();
});


jQuery(document).ready(function() {
    jQuery('.orig').focus(function() {
    jQuery('.black-bg').addClass('active');
    jQuery('#search-sec .content').addClass('active'); 
          //return false;
    });
  
    jQuery('.orig').blur(function(){
        if( !jQuery(this).val() ) {
            jQuery('.black-bg').removeClass('active');
            jQuery('#search-sec .content').removeClass('active');
        }
    });
 });



// Megamenu by delux 11.02.2019



jQuery(document).ready(function () {

    "use strict";

    jQuery('.menu-ember > ul > li:has( > ul)').addClass('menu-dropdown-icon');

    // jQuery('.menu-ember > ul > li > ul:not(:has(ul))').addClass('normal-sub');
    jQuery('.menu-ember > ul > li > ul').addClass('normal-sub');

    jQuery(".menu-ember > ul").before("<a href=\"#\" class=\"menu-mobile\"></a> ");

    jQuery(".menu-ember > ul > li").hover(
        function (e) {
            if (jQuery(window).width() > 976) {
                jQuery(this).children("ul").stop().fadeIn(150);
                e.preventDefault();
            }
        }, function (e) {
            if (jQuery(window).width() > 976) {
                jQuery(this).children("ul").stop().fadeOut(150);
                e.preventDefault();
            }
        }
    );



jQuery(".menu-ember > ul > li > ul > li").hover(
        function (e) {
            if (jQuery(window).width() > 976) {
                jQuery(this).children("ul").stop().fadeIn(150);
                e.preventDefault();
            }
        }, function (e) {
            if (jQuery(window).width() > 976) {
                jQuery(this).children("ul").stop().fadeOut(150);
                e.preventDefault();
            }
        }
    );



    jQuery(document).on('click', function(e){
        if(jQuery(e.target).parents('.menu-ember').length === 0)
            jQuery(".menu-ember > ul").removeClass('show-on-mobile');
    });

    jQuery(".menu-ember > ul > li").click(function() {
        var thisMenu = jQuery(this).children("ul");
        var prevState = thisMenu.css('display');
        jQuery(".menu-ember > ul > li > ul").fadeOut();
        if (jQuery(window).width() < 976) {
            if(prevState !== 'block')
                thisMenu.fadeIn(150);
        }
    });



 jQuery(".menu-ember > ul > li > ul > li").click(function() {
        var thisMenu = jQuery(this).children("ul");
        var prevState = thisMenu.css('display');
        jQuery(".menu-ember > ul > li > ul").fadeOut();
        if (jQuery(window).width() < 976) {
            if(prevState !== 'block')
                thisMenu.fadeIn(150);
        }
    });


    jQuery(".menu-mobile").click(function (e) {
        jQuery(".menu-ember > ul").toggleClass("show-on-mobile");
        jQuery('.black-bg').toggleClass('active');
        e.preventDefault();
    });
});


// Megamenu by delux 11.02.2019


jQuery(window).scroll(function(){
  if(jQuery(window).scrollTop()>100){
    jQuery('body').addClass('min-menu');
  } else {
     jQuery('body').removeClass('min-menu');
  }
})



jQuery(document).ready(function(){
  jQuery(".block-bavigation ul.nav li a").click(function () {
    elementClick = jQuery(this).attr("href")
    destination = jQuery(elementClick).offset().top;
    jQuery('.title_for_nav').removeClass('active');
    jQuery(elementClick).addClass('active');
    jQuery('.block-bavigation ul.nav li').removeClass('active');
    jQuery(this).closest('li').addClass('active');
    jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination - 130}, 1100);
    return false;
  });
});





jQuery(document).ready(function(){
  jQuery(".block-doctor.mini .foot a").click(function () {
    elementClick = jQuery(this).attr("href")
    destination = jQuery(elementClick).offset().top;
    jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination - 130}, 1100);
    return false;
  });
});





// Uneversal spoiler
jQuery('.spoiler > .head').on('click', function(e){
  jQuery(this).parent('div.spoiler').children('.cont').stop().slideToggle(300).toggleClass('active');
  jQuery(this).toggleClass('active');
  jQuery('.medic-slider').sliderPro('update');
  e.preventDefault();
});

jQuery(window).load(function() {
    jQuery('.medic-slider').each(function (index, value){
      jQuery(this).sliderPro('update');
    });
});




    jQuery(document).ready(function() {
        setTimeout(function(){
            jQuery('.medic-slider').sliderPro('update');
        },3000)
    });




jQuery( window ).scroll(function() {
    jQuery('.medic-slider').sliderPro('update');
    console.log('updated');
});


jQuery(document).ready(function(){
    jQuery('article').copyright();
});

