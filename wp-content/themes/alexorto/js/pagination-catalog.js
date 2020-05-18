(function( $ ) {
    $( document ).ready(function() {

        /* searching header --> */

        // $("#search-open").click(function() { 
        //     $("#search-form").show("slide", { direction: "right" }, 300); 
        // });
        // $("#search-close").click(function(event) { 
        //     event.preventDefault();
        //     $("#search-form").hide("slide", { direction: "right" }, 300); 
        // });

        /* <-- searching header */

        /* scroll header --> */

        var items = document.querySelectorAll(".products-list__item");
        var arrayItems = [];

        items.forEach(function(element) {
            arrayItems.push(element);
        });

        console.log(arrayItems);

        $('#pagination-container').pagination({
            dataSource: function(done){
                done(arrayItems);
            },
            pageSize: 3,
            autoHidePrevious: true,
            autoHideNext: true,
            activeClassName: 'current',
            classPrefix: 'pagination',
            callback: function(data) {
                $('#data-container').html(data);
            }
        })


    });
  })( jQuery );


