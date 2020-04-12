(function( $ ) {
    $( document ).ready(function() {

        /* searching header --> */

        $("#search-open").click(function() { 
            $("#search-form").show("slide", { direction: "right" }, 300); 
        });
        $("#search-close").click(function(event) { 
            event.preventDefault();
            $("#search-form").hide("slide", { direction: "right" }, 300); 
        });

        /* <-- searching header */

        /* scroll header --> */

        if (!$('.site-header').hasClass('site-header--shrink') && window.pageYOffset > 0 ) {
            $('.site-header').addClass('site-header--shrink');
        }
    
        if (window.pageYOffset == 0) {
            $('.site-header').removeClass('site-header--shrink');
        }
    
        if (!$('.menu-collapse').hasClass('d-none')) {
            $('.site-header').removeClass('site-header--shrink');
        }
    
        window.onscroll = function () {
    
            if (!$('.site-header').hasClass('site-headern--shrink') && window.pageYOffset > 0 ) {
                $('.site-header').addClass('site-header--shrink');
            }
    
            if (window.pageYOffset == 0) {
                $('.site-header').removeClass('site-header--shrink');
            }
    
        };

        /* <-- scroll header */




    });
  })( jQuery );


