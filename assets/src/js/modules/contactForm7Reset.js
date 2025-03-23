jQuery(function () {
    contactForm7Reset();
});

function contactForm7Reset() {
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        setTimeout( function() {
            var forms = document.querySelectorAll( 'form.wpcf7-form' );
            forms.forEach( function( form ) {
                form.reset();
            });
            location.reload();
        }, 10000 );
    }, false );
}
