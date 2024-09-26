$(document).ready(function () {
    $('.card').css("display", "none");

    function fadeInCards() {
        let cards = $('.card');
        let index = 0;

        let interval = setInterval(function() {
            if(index < cards.length) {
                $(cards[index]).animate({top: '30px'})
                $(cards[index]).fadeIn('slow');
                index ++
            } else {
                clearInterval(interval);
            }
        }, 500);

        $(element).fadeIn('slow');
    }
    fadeInCards();
})