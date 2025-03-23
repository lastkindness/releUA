import Swiper from 'swiper/bundle';
jQuery(function () {
    moreBuild();
});
function moreBuild () {
    setTimeout(function () {
        if (jQuery('.single-built-object__other-built-objects .swiper-container').length) {
            const swiper = new Swiper(".single-built-object__other-built-objects .swiper-container", {
                loop: true,
                slidesPerView: 2,
                centeredSlidesBounds: true,
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });
        }
    }, 1000);
}
