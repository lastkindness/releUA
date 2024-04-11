import { gsap } from "gsap/dist/gsap";
jQuery(function () {
    animTitleLine();
    $(window).resize(function() {
        var isMobile = $(window).width() <= 768;
        if (!isMobile) {
            animTitleLine();
        }
    });
});
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
