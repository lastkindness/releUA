document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector('.counter__num')) {
        let animationStarted = false;

        window.addEventListener("scroll", () => {
            if (animationStarted) return;

            const counterNums = document.querySelectorAll(".counter__num");
            const oTop = counterNums[0].getBoundingClientRect().top - window.innerHeight;

            if (window.pageYOffset > oTop) {
                animationStarted = true;

                counterNums.forEach(function (element) {
                    const countTo = parseInt(element.getAttribute("data-number"));
                    let currentNum = 0;

                    const updateCounter = () => {
                        currentNum += countTo / 200;
                        if (currentNum < countTo) {
                            element.textContent = Math.ceil(currentNum).toLocaleString("en");
                            requestAnimationFrame(updateCounter);
                        } else {
                            element.textContent = countTo.toLocaleString("en");
                        }
                    };

                    requestAnimationFrame(updateCounter);
                });
            }
        });
    }
});
