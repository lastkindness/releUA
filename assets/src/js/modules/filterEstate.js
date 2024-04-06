jQuery(function () {
    // Event listener for filter change
    $('#estate-filter').on('change', 'input[type="range"], input[type="number"], input[type="checkbox"]', function() {
        filterEstate();
    });
    $('#reset-filters-btn').click(function() {
        // Reset all filter inputs
        $('input[type="range"]').val(function() {
            return this.defaultValue;
        });
        $('input[type="number"]').val(function() {
            return this.defaultValue;
        });
        $('input[type="checkbox"]').prop('checked', false);

        // Trigger the filter function to reset the results
        filterEstate();
    });
});

function filterEstate () {

    var currentURL = window.location.href;

    function extractDomain(url) {
        // Remove any whitespace at the beginning or end of the URL
        url = url.trim();

        // Remove 'http://' or 'https://' from the beginning of the URL
        url = url.replace(/^https?:\/\//, '');

        // Remove any language subdomain followed by a dot
        url = url.replace(/^[a-zA-Z]{2}\./, '');

        // Remove anything after the first slash '/'
        url = url.split('/')[0];

        // Remove 'www.' from the beginning of the domain if present
        url = url.replace(/^www\./, '');

        // Remove any trailing slashes '/'
        url = url.replace(/\/+$/, '');

        return url;
    }

    var parts = currentURL.split('/');
    var lastPart = parts[parts.length - 2];
    var categoryFilters = [];
    var typeFilters = [];
    var districtFilters = [];
    var compatibleFilters = [];
    var subwayFilter = [];
    var floorFilter = [];
    var parkingFilter = [];
    var adTypeFilter = [];
    var backlightFilter = [];

    if (lastPart !== '' && lastPart !== '/' && lastPart !== extractDomain(currentURL)) {
        categoryFilters.push(lastPart);
    }

    $('input.estate-category-filter:checked').each(function() {
        categoryFilters.push($(this).val());
    });

    $('input.estate-type-filter:checked').each(function() {
        typeFilters.push($(this).val());
    });

    $('input.estate-district-filter:checked').each(function() {
        districtFilters.push($(this).val());
    });

    $('input.estate-compatible-filter:checked').each(function() {
        compatibleFilters.push($(this).val());
    });

    $('input.estate-subway-filter:checked').each(function() {
        subwayFilter.push($(this).val());
    });

    $('input.estate-floor-filter:checked').each(function() {
        floorFilter.push($(this).val());
    });

    $('input.parking-spaces-filter:checked').each(function() {
        parkingFilter.push($(this).val());
    });

    $('input.type-advertising-filter:checked').each(function() {
        adTypeFilter.push($(this).val());
    });
    $('input.estate-backlight-filter:checked').each(function() {
        /*var booleanValue = Boolean($(this).val())
        backlightFilter.push(booleanValue);*/
        backlightFilter.push($(this).val());
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
        subway_filters: subwayFilter,
        floor_filters: floorFilter,
        parking_filters: parkingFilter,
        ad_type_filters: adTypeFilter,
        backlight_filters: backlightFilter,
        min_room_area: minRoomArea,
        max_room_area: maxRoomArea,
        min_sale_price: minSalePrice,
        max_sale_price: maxSalePrice,
        min_rental_price: minRentalPrice,
        max_rental_price: maxRentalPrice
    };
    $.ajax({
        url: myajax.url,
        data: data,
        type: 'POST',
        success: function(response) {
            $('#estate-results').html(response);
            var numProperties = $('#estate-results').find('.card').length;
            alert(numProperties + ' properties found');
            if (numProperties > 0) {
                $('#reset-filters-btn').show();
            } else {
                $('#reset-filters-btn').hide();
            }
            if (response.trim() === '') {
                $('#load-more-container').hide(); // Hide button if no more posts
            } else {
                $('#load-more-container').show(); // Show button if more posts available
            }
        }
    });
}
