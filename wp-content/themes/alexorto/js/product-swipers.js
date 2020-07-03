(function( $ ) {
    $( document ).ready(function() {

        /* product page swipers --> */ 

        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
          
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });

        $(".gallery-top").hover(
            function() {
                galleryTop.autoplay.stop();
            },
            function() {
                galleryTop.start();
            }
        );

        /* <-- product page swipers */ 

        /* fadeout --> */

        $(".product__show").click(function(event) { 
            event.preventDefault();
            $(".product__show").fadeOut(500); 
            $("#product__phone").fadeIn(500); 
        });

        /* <-- fadeout */

    });
  })( jQuery );


