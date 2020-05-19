(function( $ ) {
    $( document ).ready(function() {

        /* pagination catalog --> */

        var items = document.querySelectorAll(".products-list__item");
        var arrayItems = [];

        items.forEach(function(element) {
            arrayItems.push(element);
        });

        if ( arrayItems.length > 12 ) {

            $('#pagination-container').pagination({
                dataSource: function(done){
                    done(arrayItems);
                },
                pageSize: 12,
                pageRange: 1,
                autoHidePrevious: true,
                autoHideNext: true,
                activeClassName: 'current',
                classPrefix: 'pagination',
                callback: function(data) {
                    $('#data-container').html(data);
                }
            })

        }

        /* <-- pagination catalog */


    });
  })( jQuery );


