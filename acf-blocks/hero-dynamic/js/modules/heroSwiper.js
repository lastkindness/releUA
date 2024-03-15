import { gsap } from "gsap/dist/gsap";

$(document).ready(() => {
    function animTitleLine() {
        gsap.fromTo(".anim-title-line", {
            y: '100%',
            duration: 1.5,
            stagger: 0.2,
            ease: "expo",
        },{
            y: '0%',
            duration: 1.5,
            stagger: 0.2,
            ease: "expo",
            opacity: 1,
        });
    };
    animTitleLine();
    $(window).resize(function() {
        if (!jQuery.browser.mobile) {
            animTitleLine();
        }
    });
});
