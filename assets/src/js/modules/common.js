jQuery(function () {
    userAgent();
    linksClick();
});

function userAgent() {
    if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 )
    {
        jQuery('body').addClass('bs-opera');
    }
    else if(navigator.userAgent.indexOf("Chrome") != -1 )
    {
        jQuery('body').addClass('bs-chrome');
    }
    else if(navigator.userAgent.indexOf("Safari") != -1)
    {
        jQuery('body').addClass('bs-safari');
    }
    else if(navigator.userAgent.indexOf("Firefox") != -1 )
    {
        jQuery('body').addClass('bs-firefox');
    }
    else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) //IF IE > 10
    {
        jQuery('body').addClass('bs-ie');
    }
    else
    {
        jQuery('body').addClass('bs-unknown');
    }
}

function linksClick() {
    $("a").on('click', function(event) {
        if (location.pathname === '/') {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                window.scrollTo({
                    top: $(hash).offset().top - 100,
                    behavior: 'smooth'
                }), 800, function(){
                    window.location.hash = hash;
                };
            }
        }
    });
}
