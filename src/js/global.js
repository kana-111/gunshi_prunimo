//bg-video再生速度
document.addEventListener('DOMContentLoaded', () => {
    const video = document.querySelector('.js-bg-video');
    if (!video) return;
    video.playbackRate = 0.6;
});


//faq
jQuery(function ($) {
    const $questions = $('.js-faq-question');
    const $first = $questions.first();
    const $firstAnswer = $first.next();

    $firstAnswer.hide();

    $firstAnswer.slideDown(0);
    $first.addClass('is-open');

    $questions.on('click', function () {
        $(this).next().slideToggle();
        $(this).toggleClass('is-open');
    });
});

