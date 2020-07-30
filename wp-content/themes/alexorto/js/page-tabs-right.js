(function( $ ) {
    $( document ).ready(function() {

        /* tabs right --> */ 

        $('.tabs-right__input').change(function() {

            var dataTag = $(this).attr("data-tag");
            
            $('.tabs-right__content--active').removeClass("tabs-right__content--active");
            $('.tabs-right__content').each(function () {
                if( $(this).attr('data-tag') ==  dataTag) {
                    $(this).addClass("tabs-right__content--active");
                }
              });
        });

        /* <-- tabs right */ 

    });
  })( jQuery );


