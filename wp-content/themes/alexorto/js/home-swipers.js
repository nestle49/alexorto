(function( $ ) {
    $( document ).ready(function() {

        /* home page swipers --> */ 

        var mySwiper = new Swiper(".swiper-container", {
            effect: "slide",
            // effect: 'fade',
            speed: 2000,
            loop: true,
            autoHeight: true,
            autoplay: {
            delay: 3000
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });


        $(".swiper-container").hover(
            function() {
                mySwiper.autoplay.stop();
            },
            function() {
                mySwiper.autoplay.start();
            }
        );

        /* <-- home page swipers */ 

    });

  })( jQuery );


