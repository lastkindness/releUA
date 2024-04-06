jQuery(function () {
    loadMorePosts();
});

function loadMorePosts() {
    $('#load-more-posts').on('click', function () {
        var button = $(this);
        var nextPage = parseInt(button.data('current-page')) + 1;
        var maxPages = parseInt(button.data('max-pages'));

        button.html('<span class="spinner"></span> Loading...');
        var data = {
            action: 'loadmore',
            page: nextPage
        };

        $.ajax({
            url: myajax.url,
            data: data,
            type: 'POST',
            success: function (response) {
                $('#estate-results').append(response);
                button.data('current-page', nextPage);
                if (nextPage >= maxPages) {
                    button.prop('disabled', true).addClass('disabled');
                }
                button.html("Load More");
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}
