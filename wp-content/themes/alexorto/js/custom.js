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

        /* input file customization --> */

        $('input[type="file"]').change(function(){
            var value = $("input[type='file']").val();
            value = value.toString();
            value = value.split("\\");
            if ($('.uploaded-file')) { 
                $('.uploaded-file').text(value[value.length - 1]); 
            }
        });

        /* <-- input file customization */

        /* scroll to top --> */

        $(window).scroll(function () {

            $(this).scrollTop() > 0 ? $('#scroll-top').fadeIn(1, "linear") : $('#scroll-top').fadeOut("slow", "linear");

        });

        $('#scroll-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });

        /* <-- scroll to top */

        /* mobile top menu --> */

        $("#primary-menu-toggle").click(function() { 
            $('.mobile-menu').fadeIn();
            $(".mobile-menu__container").show("slide", { direction: "left" }, 300); 
            // $(".mobile-menu__container").show("slide", { direction: "left" }, 300); 
        });

        $("#mobile-menu-close").click(function() { 
            $(".mobile-menu__container").hide("slide", { direction: "left" }, 300); 
            $('.mobile-menu').fadeOut();
        });

        $(document).mouseup(function (e){ 
            var field = $(".mobile-menu__container"); 
            if (!field.is(e.target) 
                && field.has(e.target).length === 0) {
                    $(".mobile-menu__container").hide("slide", { direction: "left" }, 300); 
                    $('.mobile-menu').fadeOut();
            }
        });

        $("#primary-menu-mobile > .menu-item-has-children > a").click(function(e) { /* 2 level menu */
            e.preventDefault();
            console.log(e.target);
            console.log(this);
            $(this).siblings(".sub-menu").addClass("sub-menu--opened");
            $(this).siblings(".sub-menu").show("slide", { direction: "right" }, 300); 
            $("#mobile-menu-back").animate({
                opacity: 1
            }, 'slow');
        });

        $(".menu-item-has-children > a + .sub-menu > .menu-item-has-children > a").click(function(e) { /* 3 level menu */
            e.preventDefault();
            console.log(e.target);
            console.log(this);
            $(this).siblings(".sub-menu").addClass("sub-menu--opened");
            $(this).siblings(".sub-menu").show("slide", { direction: "left" }, 300); 
        });


        /* <-- mobile top menu */

        // $("#search-open").click(function() { 
        //     $("#search-form").show("slide", { direction: "right" }, 300); 
        // });
        // $("#search-close").click(function(event) { 
        //     event.preventDefault();
        //     $("#search-form").hide("slide", { direction: "right" }, 300); 
        // });



    });
  })( jQuery );


