jQuery(function () {
    // Event listener for filter change
    $('#estate-filter').on('change', 'input[type="range"], input[type="number"], input[type="checkbox"]', function() {
        filterEstate();
    });
});

function filterEstate () {
    var currentURL = window.location.href;
    var parts = currentURL.split('/');
    var lastPart = parts[parts.length - 2];
    var categoryFilters = [];
    var typeFilters = [];
    var districtFilters = [];
    var compatibleFilters = [];

    if (lastPart !== '' && lastPart !== 'index.html') {
        categoryFilters.push(lastPart);
    }

    // Collect selected category filter values
    $('input.estate-category-filter:checked').each(function() {
        categoryFilters.push($(this).val());
    });

    // Collect selected type filter values
    $('input.estate-type-filter:checked').each(function() {
        typeFilters.push($(this).val());
    });

    // Collect selected district filter values
    $('input.estate-district-filter:checked').each(function() {
        districtFilters.push($(this).val());
    });

    // Collect selected compatible filter values
    $('input.estate-compatible-filter:checked').each(function() {
        compatibleFilters.push($(this).val());
    });

    var minRoomArea = $('#room-area-min').val(); // Example: ACF field for minimum area
    var maxRoomArea = $('#room-area-max').val(); // Example: ACF field for minimum area
    var minSalePrice = $('#sale-price-min').val(); // Example: ACF field for minimum sale price
    var maxSalePrice = $('#sale-price-max').val(); // Example: ACF field for maximum sale price
    var minRentalPrice = $('#rental-price-min').val(); // Example: ACF field for minimum rental price
    var maxRentalPrice = $('#rental-price-max').val(); // Example: ACF field for maximum rental price

    var data = {
        action: 'filter_estate',
        category_filters: categoryFilters,
        type_filters: typeFilters,
        district_filters: districtFilters,
        compatible_filters: compatibleFilters,
        min_room_area: minRoomArea,
        max_room_area: maxRoomArea,
        min_sale_price: minSalePrice,
        max_sale_price: maxSalePrice,
        min_rental_price: minRentalPrice,
        max_rental_price: maxRentalPrice
    };

    console.log(data);

    $.ajax({
        url: myajax.url,
        data: data,
        type: 'POST',
        success: function(response) {
            $('#estate-results').html(response);
        }
    });
}
