import Swiper from 'swiper/bundle';

$(document).ready(() => {
    if (jQuery('.slider-img-text__slider').length) {
        const swiper = new Swiper(".slider-img-text__slider", {
            loop: true,
            spaceBetween: 80,
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
