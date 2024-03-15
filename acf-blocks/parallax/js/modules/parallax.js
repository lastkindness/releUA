document.addEventListener('DOMContentLoaded', function () {
    const parallaxBoxes = document.querySelectorAll('.parallax__box');

    window.addEventListener('scroll', () => {
        parallaxBoxes.forEach(parallaxBox => {
            const speed = parallaxBox.getAttribute('data-speed');
            const topPos = parallaxBox.getBoundingClientRect().top;
            const yPos = -(topPos / speed);

            parallaxBox.style.transform = `translateY(${yPos}px)`;
        });
    });
});
