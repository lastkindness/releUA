import Swiper from 'swiper/bundle';

$(document).ready(() => {
    if (jQuery('.hero__slider').length) {
        const swiper = new Swiper(".hero__slider", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }
});