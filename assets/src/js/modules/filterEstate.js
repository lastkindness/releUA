jQuery(function () {
    $('#estate-filter').on('change', 'input[type="range"], input[type="number"], input[type="checkbox"]', function() {
        filterEstate();
    });
    $('#reset-filters-btn').click(function() {
        $('input[type="range"]').val(function() {
            return this.defaultValue;
        });
        $('input[type="number"]').val(function() {
            return this.defaultValue;
        });
        $('input[type="checkbox"]').prop('checked', false);
        filterEstate();
    });
});

function filterEstate () {
    var button = $('#load-more-posts');
    $(button).data('current-page', 1);
    var currentURL = window.location.href;
    var currentPage = parseInt(button.data('current-page'));
    var nextPage = parseInt(button.data('current-page')) + 1;
    var maxPages = parseInt(button.data('max-pages'));
    function extractDomain(url) {
        url = url.trim();
        url = url.replace(/^https?:\/\//, '');
        url = url.replace(/^[a-zA-Z]{2}\./, '');
        url = url.split('/')[0];
        url = url.replace(/^www\./, '');
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
    /*if (lastPart !== '' && lastPart !== '/' && lastPart !== extractDomain(currentURL)) {
        categoryFilters.push(lastPart);
    }*/
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
        backlightFilter.push($(this).val());
    });

    var minRoomArea = $('#room-area-min').val(); // Example: ACF field for minimum area
    var maxRoomArea = $('#room-area-max').val(); // Example: ACF field for minimum area
    var minSalePrice = $('#sale-price-min').val(); // Example: ACF field for minimum sale price
    var maxSalePrice = $('#sale-price-max').val(); // Example: ACF field for maximum sale price
    var minRentalPrice = $('#rental-price-min').val(); // Example: ACF field for minimum rental price
    var maxRentalPrice = $('#rental-price-max').val(); // Example: ACF field for maximum rental price
    var maxPostsPerPage = Number($('#posts-per-page').val());


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
            var numberOfPosts = $('#estate-results').find('.card').length;
            var maxPosts = Number($('#max-posts').val());
            var maxPostsPerPage = Number($('#max-post-per-page').val());
            var postsFoundFilters = Number($('#found-post-filters').val());
            $('#found-filters-posts').html(postsFoundFilters);
            if (numberOfPosts > 0 && postsFoundFilters<maxPosts) {
                $('#reset-filters-btn').show();
                $('#found-filters-block').show();
            } else {
                $('#reset-filters-btn').hide();
                $('#found-filters-block').hide();
            }
            if (nextPage >= maxPages||postsFoundFilters<=maxPostsPerPage) {
                $('#load-more-posts').addClass('btn_disabled').prop('disabled', true);
            } else {
                $('#load-more-posts').removeClass('btn_disabled').prop('disabled', false);
            }
        }
    });
}
