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

        // $('.search-field').on('input', function () {
        //     console.log("TTT");
        //     console.log(this.value.length);
        //     if (this.value.length > 0) {
        //         console.log("trie");
        //         $('.menu_open--search').addClass('search-no--border');
        //         $('.searchwp-live-search-results-showing').show();
        //         const SearchContent = document.querySelector('.searchwp-live-search-results-showing');
        //         if(SearchContent) {
                    
        //             console.log('SearchContent');
        //             const simpleBar = new SimpleBar(document.querySelector('.searchwp-live-search-results-showing'), {
        //                 autoHide: false
        //             })
        //             console.log(simpleBar.getScrollElement());
                    
                 
        //         }
                
         
        //     } 
        // });

        // new SimpleBar(document.querySelector('.sub-menu'), {
        //                 autoHide: false
        // })

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
            $(this).siblings(".sub-menu").addClass("sub-menu--opened");
            $(this).siblings(".sub-menu").show("slide", { direction: "right" }, 300); 
            $("#mobile-menu-back").animate({
                opacity: 1
            }, 'slow');
        });

        $("#primary-menu-mobile .menu-item-has-children > a + .sub-menu > .menu-item-has-children > a").click(function(e) { /* 3 level menu opened */
            e.preventDefault();
            $(this).siblings(".sub-menu").addClass("sub-menu--opened");
            $(this).siblings(".sub-menu").show("slide", { direction: "left" }, 300); 
        });

        $("#mobile-menu-back").click(function(e) { /* 2 level menu opened */
            e.preventDefault();

            var lvl2 = $("#primary-menu-mobile > .menu-item-has-children > .sub-menu--opened");
            var lvl3 = $(".menu-item-has-children > .sub-menu > .menu-item-has-children > .sub-menu--opened");
            
            if (lvl3.length) {  /* if 3 level menu is opened */

                lvl3.hide("slide", { direction: "left" }, 300); 

                setTimeout(function(){
                    lvl3.removeClass('sub-menu--opened');
                }, 300);

            } else if (lvl2.length){ /* else if 2 level menu is opened */

                lvl2.hide("slide", { direction: "right" }, 300); 

                setTimeout(function(){
                    lvl2.removeClass('sub-menu--opened');
                }, 300);

                $("#mobile-menu-back").animate({
                    opacity: 0
                }, 'slow');

            }
            
        });

        /* <-- mobile top menu */

        /* select size at cf7 order --> */

        $('.product__radio').change(function() {
            var selectedSize = parseInt($(this).attr("data-id"));
            var selectSizes = $("#select-sizes");
            if (selectedSize && selectSizes) {
                $(`#select-sizes option[value=${selectedSize}]`).prop('selected', true);
            }
        });

        /* <-- select size at cf7 order */

    });
  })( jQuery );


