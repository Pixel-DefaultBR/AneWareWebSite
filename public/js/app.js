const navItems = $('.nav-item');

$(document).ready(function () {
    $(window).on('resize', function () {
        $('html').css({
            'max-width': window.innerWidth,
            'max-height': window.innerHeight,
        })
        $('body').css({
            'max-width': window.innerWidth,
            'max-height': window.innerHeight,
        })
    })

    uploadImage();
    showDeleteBtn();
    getSeverity();
    showErrorHandleCard();
});


function uploadImage() {
    const canEditTopImg = $('.can-edit-top-img');
    const canEditProfileImg = $('.can-edit-profile-img');
    const fileInputTopImage = $('.edit-input-top-img').css('display', 'none');
    const fileInputProfileImage = $('.edit-input-profile-img').css('display', 'none');
    const csrfToken = $('meta[name="_token"]').attr('content');
    const maxFileSize = fileInputTopImage.data('max-size');

    let csrfInput = document.createElement('input');
    csrfInput.setAttribute('type', 'hidden');
    csrfInput.setAttribute('name', '_token');
    csrfInput.setAttribute('value', csrfToken);

    const form = $('<form action="/profile/edit" method="post" enctype="multipart/form-data"></form>');
    $(form).append(csrfInput);

    $(canEditTopImg).on('click', function () {
        if ($(this).prop('tagName') === 'IMG') {
            if ($(fileInputTopImage).attr('id') === 'dashboard-image') {
                $(fileInputTopImage).attr('name', 'dashboard-image')
            }

            $(fileInputTopImage).trigger('click');

            $(fileInputTopImage).on('change', function () {

                $(form).append(fileInputTopImage);
                $('body').append(form);
                form.submit();
            })
        }
    })

    $(canEditProfileImg).on('click', function () {
        if ($(this).prop('tagName') === 'IMG') {
            if ($(fileInputProfileImage).attr('id') === 'profile-image') {
                $(fileInputProfileImage).attr('name', 'profile-image')
            }

            $(fileInputProfileImage).trigger('click');
            
            $(fileInputProfileImage).on('change', function () {
                $(form).append(fileInputProfileImage);
                $('body').append(form);
                form.submit();
            })
            $(this).css('opacity', '0.5');
        }
    })
}

function showDeleteBtn() {
    const a = $('<a class="btn btn-action-pf-delete"></a>')

    $(a)
        .css('display', 'none')
        .html('<i class="fa-solid fa-trash"></i>');

    const reportCardImage = $('.card-profile');

    $(reportCardImage).each((index, element) => {
        const reportId = $(element).data('report-id');
        $(element).on('mouseover', function () {
            $(a).css({
                'display': 'flex',
            })
                .attr('href', `/report/delete/${reportId}`)

            $(this).css('display', 'none');
            $(this).after(a);

            $(a).on('click', function () {
                console.log('{{$report->id}}')
            })

            $(a).on('mouseleave', function () {
                $(a).css({
                    'display': 'none',
                })

                $(reportCardImage).css('display', 'flex');
            })
        })
    });
}

function getSeverity() {
    const severityStatus = $('.report-severity');
    const severityLogo = $('.severity-icon');

    $(severityStatus).each((index, element) => {
        let statusIcon = document.createElement('img');

        if ($(severityStatus[index]).text() === 'Crítico') {
            statusIcon.src = '../img/critical-status.png';
            $(severityLogo[index]).append(statusIcon);
        } else if ($(severityStatus[index]).text() == 'Alta') {
            statusIcon.src = '../img/high-status.png';
            $(severityLogo[index]).append(statusIcon);
        } else if ($(severityStatus[index]).text() == 'Médio') {
            statusIcon.src = '../img/medium-status.png';
            $(severityLogo[index]).append(statusIcon);
        } else if ($(severityStatus[index]).text() == 'Baixo') {
            statusIcon.src = '../img/low-status.png';
            $(severityLogo[index]).append(statusIcon);
        } else if ($(severityStatus[index]).text() == 'Informativo') {
            statusIcon.src = '../img/informative.png';
            $(severityLogo[index]).append(statusIcon);
        } else {
            statusIcon.src = '../img/none-status.png';
            $(severityLogo[index]).append(statusIcon);
        }
    })
}

function showErrorHandleCard() {
    $('.message-card').css('display', 'none');
    $('.message-card').fadeIn(1000, function () {
        setInterval(function () {
            $('.message-card').fadeOut();
        }, 4000);
    });
}

function getDeviceSize() {
    const width = window.innerWidth;
    const height = window.innerHeight;
    return width, height
}