document.addEventListener('DOMContentLoaded', () => {
    const swipers = document.querySelectorAll('.js-mv-swiper');
    if (!swipers.length) return;

    swipers.forEach((el) => {
        new Swiper(el, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 2000,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
        });
    });
});
