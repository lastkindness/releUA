jQuery(function () {
    filterEstate();
});

function filterEstate () {
    var categoryFilters = [];
    var typeFilters = [];
    var districtFilters = [];
    var compatibleFilters = [];
    var roomArea = $('#room-area').val(); // Example: ACF field for minimum area
    var minPrice = $('#min-price').val(); // Example: ACF field for minimum price
    var maxPrice = $('#max-price').val(); // Example: ACF field for maximum price

    // Collect selected category filter values
    $('input.estate-category-filter:checked').each(function() {
        console.log($(this).val());
        categoryFilters.push($(this).val());
    });

// Collect selected type filter values
    $('input.estate-type-filter:checked').each(function() {
        console.log($(this).val());
        typeFilters.push($(this).val());
    });

    // Collect selected district filter values
    $('input.estate-district-filter:checked').each(function() {
        console.log($(this).val());
        districtFilters.push($(this).val());
    });

    // Collect selected compatible filter values
    $('input.estate-compatible-filter:checked').each(function() {
        console.log($(this).val());
        compatibleFilters.push($(this).val());
    });

    var data = {
        action: 'filter_estate',
        category_filters: categoryFilters,
        type_filters: typeFilters,
        district_filters: districtFilters,
        compatible_filters: compatibleFilters,
    };

    $.ajax({
        url: myajax.url,
        data: data,
        type: 'POST',
        success: function(response) {
            $('#estate-results').html(response);
        }
    });

    // Event listener for filter change
    $('#estate-filter').on('change', 'input[type="range"]', function() {
        filterEstate();
        console.log(data);
    });
    $('#estate-filter').on('change', 'input[type="checkbox"]', function() {
        filterEstate();
        console.log(data);
    });
}
