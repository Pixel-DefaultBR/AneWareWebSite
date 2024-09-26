

$(document).ready(function () {
    $('.card').css('display', 'none');
    let cardComponents = $('.apear-card');
    const fileInput = $('.file-input');
    const imagePreview = $('#image-preview');
    const sweetAlert = $('.sweeetalert');

    $(fileInput).on('change', function () {
        const file = $(this)[0].files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.attr('src', e.target.result);
                imagePreview.css('display', 'block');
            }

            reader.readAsDataURL(file);
        }
    });

    function fadeInCards() {
        let cards = $('.card');
        let index = 0;

        let interval = setInterval(function () {
            if (index < cards.length) {
                $(cards[index]).fadeIn('slow').css('animation', `upAnimation 2s`);
                index++
            } else {
                clearInterval(interval);
            }
        }, 500);

        $(element).fadeIn('slow');
    }

   fadeInCards()
    
})



