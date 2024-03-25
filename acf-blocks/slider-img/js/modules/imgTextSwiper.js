import Swiper from 'swiper/bundle';

$(document).ready(() => {
    if (jQuery('.slider-img__slider').length) {
        const swiper = new Swiper(".slider-img__slider", {
            loop: true,
            centeredSlides: true,
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
