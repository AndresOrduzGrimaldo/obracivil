
// makes sure the whole site is loaded
$(window).load(function () {
// will first fade out the loading animation
    $(".loaded").fadeOut();
    // will fade out the whole DIV that covers the website.
    $(".loader").delay(1000).fadeOut("slow");
});




$(document).ready(function () {
    "use strict";


    /*---------------------------------------------*
     * STICKY TRANSPARENT NAVIGATION 
     ---------------------------------------------*/


    var windowWidth = $(window).width();

    if (windowWidth > 767) {
        $(".navbar-1").addClass('custom-nav');
// fade in .sticky_navigation
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.navbar-1').addClass('scroll-nav animated fadeIn');
                $('.navbar-1').removeClass('custom-nav');
            } else {
                $('.navbar-1').addClass('custom-nav');
                $('.navbar-1').removeClass('scroll-nav animated fadeIn');
            }
        });
    }


    /*---------------------------------------------*
     * STICKY HIDE NAVIGATION 
     ---------------------------------------------*/

    var windowWidth = $(window).width();
    if (windowWidth > 767) {
// hide .sticky_navigation first
        $(".hide-nav").hide();
// fade in .sticky_navigation
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.hide-nav').fadeIn(1000);
            } else {
                $('.hide-nav').fadeOut(1000);
            }
        });

    }




    /*---------------------------------------------*
     * LOCAL SCROLL
     ---------------------------------------------*/

    $('#main-navbar').localScroll();
    $('.anchor').localScroll();




    /*---------------------------------------------*
     * WOW
     ---------------------------------------------*/
//    var wow = new WOW({
//        mobile: false, // trigger animations on mobile devices (default is true)
//    });
//    wow.init();




    /* ------------------------------------------------=
     ---=  MAILCHIMP                 ------
     ---------------------------------------------------= */

    $('#mailchimp').ajaxChimp({
        callback: mailchimpCallback,
        url: "http://facebook.us8.list-manage.com/subscribe/post-json?u=85f515a08b87483d03fee7755&id=dff5d2324f" //Replace this with your own mailchimp post URL. Don't remove the "". Just paste the url inside "".  
    });
    function mailchimpCallback(resp) {
        if (resp.result === 'success') {
            $('.subscription-success').html('<h4><i class="fa fa-check"></i> ' + resp.msg + '</h4>').fadeIn(1000);
            $('.subscription-error').fadeOut(500);
        } else if (resp.result === 'error') {
            $('.subscription-error').html('<h4><i class="fa fa-times-circle"></i> ' + resp.msg + '</h4>').fadeIn(1000);
        }
    }




    /* ------------------------------------------------=
     ---=  ACCORDIAN                 ------
     ---------------------------------------------------= */

    function toggleChevron(e) {
        $(e.target)
                .prev('.panel-heading')
                .find("i.indicator")
                .toggleClass('glyphicon-plus-sign glyphicon-minus-sign');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);
    $('#accordion2').on('hidden.bs.collapse', toggleChevron);
    $('#accordion2').on('shown.bs.collapse', toggleChevron);



    /* ------------------------------------------------=
     ---=  FITVIDS              ------
     ---------------------------------------------------= */


    // Target your .container, .wrapper, .post, etc.
    $('.describe-video').fitVids();



    /* ------------------------------------------------=
     ---=  COMMING SOON                 ------
     ---------------------------------------------------= */

//JUST EDIT LIKE Date(2015, 0, 1, 9, 30) 2015 IS YEAR, 0 JANUEARY MONTH, 1 DATE, 9 minute,  30 SECOND

//how: 2015, 2( month start with 0, 0 = jan, 1 = feb, 3 = march ), 6 (date)
//
    //$('#myCounter').mbComingsoon({expiryDate: new Date(2015, 3, 5, 9, 30), speed: 100});
    $('#myCounter').mbComingsoon({expiryDate: new Date(2015, 1, 21, 18, 30), speed: 100});



});



/* ------------------------------------------------=
 ---=  COUNTER                 ------
 ---------------------------------------------------= */


$('.countdown').each(function () {
    $(this).countdown({
        until: new Date($(this).attr('data-date'))
    });
});

/* ---------------------------------------------------------------------
 NIVO LIGHT BOX
 ---------------------------------------------------------------------= */


//$('.screenshots a').nivoLightbox({
//    effect: 'fadeScale'
//});


//$('.portfolio a').nivoLightbox({
//    effect: 'fadeScale'
//});


/* ---------------------------------------------------------------------
 Carousel
 ---------------------------------------------------------------------= */


$('.testimonials').owlCarousel({
    responsiveClass: true,
    autoplay: false,
    items: 1,
    loop: true,
    dots: true,
    autoplayHoverPause: true

});

$('.screenshots').owlCarousel({
    responsiveClass: true,
    autoplay: true,
    items: 4,
    loop: true,
    margin: 20,
    dots: true,
    autoplayHoverPause: true,
    responsive: {
        // breakpoint from 0 up
        // breakpoint from 480 up
        0: {
            items: 1
        },
        480: {
            items: 2
        },
        // breakpoint from 768 up
        768: {
            items: 2
        },
        980: {
            items: 4
        }
    }
});




/* ------------------------------------------------=
 ---=  Video Player                ------
 ---------------------------------------------------= */


//$(".player").YTPlayer();



/* ------------------------------------------------=
 ---=  Skills                ------
 ---------------------------------------------------= */


$('.chart').easyPieChart({
    easing: 'easeOutBounce',
    animate: 2000,
    scaleColor: false,
    lineWidth: 12,
    lineCap: 'square',
    size: 150,
    trackColor: '#EDEDED',
    barColor: '#1ac6ff',
    onStep: function (from, to, percent) {
        $(this.el).find('.percent').text(Math.round(percent));
    }
});





// /* ------------------------------------------------=
//  ---=  Twitter                ------
//  ---------------------------------------------------= */

// var xs_tweet = {
//     "id": '569000074533814272',
//     "domId": 'tweet',
//     "maxTweets": 3,
//     "enableLinks": true,
//     "showUser": true,
//     "showTime": true,
//     "dateFunction": '',
//     "showRetweet": false,
//     "customCallback": handleTweets,
//     "showInteraction": false
// };

// function handleTweets(tweets) {
//     var x = tweets.length;
//     var n = 0;
//     var element = document.getElementById('tweet');
//     var html = '<div class="slides">';
//     while (n < x) {
//         html += '<div>' + tweets[n] + '</div>';
//         n++;
//     }
//     html += '</div>';
//     element.innerHTML = html;
//     /* Twits attached to owl-carousel */
//     $("#tweet .slides").owlCarousel({
//         responsiveClass: true,
//         autoplay: true,
//         items: 1,
//         autoplayHoverPause: true,
//         loop: true
//     });
// }




