

$(document).ready(function () {
    $('.card').css('display', 'none');

    function copyRepoCode() {
        $('.copy-code').each(function(index, element) {
            $(element).on('click', function () { 
                $(element).animate({
                    opacity: 0.5,
                })
                navigator.clipboard.writeText($(element).text());
            });
        })
    }

    copyRepoCode()

    function alertApear() {
        $('.alert').css('display', 'none');

        $('.alert').css('animation', 'alertShow 0.5s').fadeIn('slow', function () {
            setTimeout(() => {
                $('.alert').css('animation', 'alertHide 0.5s').fadeOut();
            }, 3000);
        })
    }

    alertApear();
    function imagePreview() {
        const fileInput = $('#file-input');
        const imagePreview = $('#image-preview');

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
    }


    function btnLoginAnimation() {
        let btnLogin = $('.btn-login');

        $(btnLogin).mouseenter(function () {
            $(this).fadeOut('fast', function () {
                $(this).html('<i class="fa-solid fa-right-to-bracket"></i>').fadeIn('fast');
            });
        });

        $(btnLogin).mouseleave(function () {
            $(this).fadeOut('fast', function () {
                $(this).html('<i class="fa-solid fa-door-open"></i>').fadeIn('fast');
            });
        });
    }

    function fadeInCards() {
        let cards = $('.card');
        let index = 0;

        let interval = setInterval(function () {
            if (index < cards.length) {
                $(cards[index]).fadeIn('slow').css('animation', `upAnimation ${index + 0.4}s`);
                index++
            } else {
                clearInterval(interval);
            }
        }, 600);

        $(element).fadeIn('slow');
    }

    imagePreview();
    btnLoginAnimation();
    fadeInCards();
});



