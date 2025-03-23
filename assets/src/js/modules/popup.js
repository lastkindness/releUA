jQuery(function () {
    popup();
});

function popup() {
    var popup = document.querySelector('.popup');
    var popupClose = document.querySelector('.popup__close');
    var popupBtn = document.querySelector('.didnt-find-banner__btn');
    if(popup) {
        popupBtn.addEventListener('click', function(e) {
            e.preventDefault();
            document.documentElement.classList.add('popup-open');
            popup.style.display = 'block';
        });
        popupClose.addEventListener('click', function() {
            popup.style.display = 'none';
            document.documentElement.classList.remove('popup-open');
        });
        window.addEventListener('click', function(e) {
            if (e.target == popup) {
                popup.style.display = 'none';
                document.documentElement.classList.remove('popup-open');
            }
        });
    }
}
