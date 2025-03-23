jQuery(function () {
    loadMorePosts();
});

function loadMorePosts() {
    $('#load-more-posts').on('click', function () {
        var button = $(this);
        var nextPage = parseInt(button.data('current-page')) + 1;
        var currentPage = parseInt(button.data('current-page'));
        var maxPages = parseInt(button.data('max-pages'));
        var text = $(button).text();
        button.html('<span class="spinner"><svg width="200px" height="200px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;"><circle cx="75" cy="50" fill="#ffffff" r="6.39718"><animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.875s"></animate></circle><circle cx="67.678" cy="67.678" fill="#ffffff" r="4.8"><animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.75s"></animate></circle><circle cx="50" cy="75" fill="#ffffff" r="4.8"><animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.625s"></animate></circle><circle cx="32.322" cy="67.678" fill="#ffffff" r="4.8"><animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.5s"></animate></circle><circle cx="25" cy="50" fill="#ffffff" r="4.8"><animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.375s"></animate></circle><circle cx="32.322" cy="32.322" fill="#ffffff" r="4.80282"><animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.25s"></animate></circle><circle cx="50" cy="25" fill="#fff" r="6.40282"><animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.125s"></animate></circle><circle cx="67.678" cy="32.322" fill="#fff" r="7.99718"><animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="0s"></animate></circle></svg></span>');

        var currentURL = window.location.href;
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

        var data = {
            action: 'loadmore',
            page: nextPage,
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
            success: function (response) {
                $('#estate-results').append(response);
                var numberOfPosts = $('#estate-results').find('.card').length;
                var maxPosts = Number($('#max-posts').val());
                var maxPostsPerPage = Number($('#max-post-per-page').val());
                var postsFoundFilters = Number($('#found-post-filters').val());
                button.data('current-page', nextPage);
                button.html(text);
                if (nextPage >= maxPages || numberOfPosts>=postsFoundFilters) {
                    $(button).addClass('btn_disabled').prop('disabled', true);
                } else {
                    $(button).removeClass('btn_disabled').prop('disabled', false);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}
