$(function () {
    $(".owl-carousel").owlCarousel({
        items: 4,
        margin: 35,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        nav: true,
        navText: ['<p class="carousel-left right-align col s1 offset-s5"><i class="large material-icons light-blue-text text-lighten-1">chevron_left</i></p>', '<p class="carousel-right col s1 left-align"><i class="large material-icons light-blue-text text-lighten-1">chevron_right</i></p>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3,
                margin: 25
            },
            992: {
                items: 4,
                margin: 25
            }
        }
    });

    $('.owl-nav').addClass('row');
});
