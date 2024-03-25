jQuery(function () {
    filterEstate();
});

function filterEstate () {
    function filterEstate() {
        var data = {
            action: 'filter_estate', // AJAX action
            // Add selected filter values here
        };

        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            success: function(response) {
                $('#estate-results').html(response);
            }
        });
    }

    // Event listener for filter change
    $('#estate-filter').on('change', 'input[type="checkbox"]', function() {
        filterEstate();
    });
}
