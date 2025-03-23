jQuery(function () {
    webpLinkConverlor();
});

function webpLinkConverlor () {
    var images = document.querySelectorAll('img');
    images.forEach(function(img) {
        var src = img.getAttribute('src');
        var newSrc = src.replace(/\.(jpg|jpeg|png)$/i, '.webp');
        img.setAttribute('src', newSrc);
    });

    var sources = document.querySelectorAll('source');
    sources.forEach(function(source) {
        var srcset = source.getAttribute('srcset');
        var newSrcset = srcset.replace(/\.(jpg|jpeg|png)$/i, '.webp');
        source.setAttribute('srcset', newSrcset);
    });

    var lightboxLinks = document.querySelectorAll('a.glightbox');
    lightboxLinks.forEach(function(link) {
        var href = link.getAttribute('href');
        var newHref = href.replace(/\.(jpg|jpeg|png)$/i, '.webp');
        link.setAttribute('href', newHref);
    });

    document.addEventListener('click', function(event) {
        var target = event.target;
        var img = document.querySelectorAll('.gslide.loaded img');
        img.forEach(function(item) {
            var src = item.getAttribute('src');
            var newSrc = src.replace(/\.(jpg|jpeg|png)$/i, '.webp');
            item.setAttribute('src', newSrc);
        });
        setTimeout(function () {
            var allSlides = document.querySelectorAll('.gslide.loaded');
            allSlides.forEach(function(slide) {
                slide.classList.remove('current');
            });
            allSlides[allSlides.length-2].classList.add('current');
        }, 1);
    });
}
