jQuery(function () {
    backToTop();
});

function backToTop () {
    let mybutton = document.getElementById("back-to-top");

    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction () {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    mybutton.addEventListener("click", backToTopScroll);

    function backToTopScroll () {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
}
