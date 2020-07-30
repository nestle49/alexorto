(function( $ ) {
    $( document ).ready(function() {

        const delay = (ms) => {
            return new Promise(resolve => setTimeout(resolve, ms));
        };

        function scrollToTargetAdjusted($targetId) {
            let element = document.getElementById($targetId);
            let headerOffset = -200;
            let offsetPosition = element.getBoundingClientRect().top + window.pageYOffset + headerOffset;
            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth"
            });
        }

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
                },
                afterRender: function () {
                    delay(100).then(() =>scrollToTargetAdjusted('data-container'));
                },
            })

        }

        /* <-- pagination catalog */


    });
  })( jQuery );


