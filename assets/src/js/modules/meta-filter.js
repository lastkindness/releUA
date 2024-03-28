jQuery(function () {
    metaFilter('room-area');
    metaFilter('sale-price');
    metaFilter('rental-price');
});

function metaFilter(fieldPrefix) {
    // Get the range inputs and number input elements
    var minRange = document.getElementById(fieldPrefix + '-min');
    var maxRange = document.getElementById(fieldPrefix + '-max');
    var minInput = document.getElementById(fieldPrefix + '-min-value');
    var maxInput = document.getElementById(fieldPrefix + '-max-value');
    var startOuter = document.querySelector('.' + fieldPrefix + '-filter .price-outer_start');
    var endOuter = document.querySelector('.' + fieldPrefix + '-filter .price-outer_end');
    var rangeBg = document.querySelector('.' + fieldPrefix + '-filter .range_bg');

    // Update the range input values when the number input values change
    minInput.addEventListener('input', function () {
        minRange.value = minInput.value;
        updateWidths();
    });

    maxInput.addEventListener('input', function () {
        maxRange.value = maxInput.value;
        updateWidths();
    });

    // Update the number input values when the range input values change
    minRange.addEventListener('input', function () {
        minInput.value = minRange.value;
        updateWidths();
    });

    maxRange.addEventListener('input', function () {
        maxInput.value = maxRange.value;
        updateWidths();
    });

    // Update the width of the start and end background elements based on the range values
    function updateWidths() {
        var min = parseFloat(minRange.value);
        var max = parseFloat(maxRange.value);
        var total = parseFloat(maxRange.max) - parseFloat(maxRange.min);

        var startWidth = ((min - parseFloat(minRange.min)) / total) * 100 + '%';
        var endWidth = ((parseFloat(maxRange.max) - max) / total) * 100 + '%';

        startOuter.style.width = startWidth;
        endOuter.style.width = endWidth;

        rangeBg.style.left = startWidth;
        rangeBg.style.width = 'calc(' + (100 - parseFloat(startWidth)) + '% - ' + endWidth + ')';
    }

    // Initial call to set widths
    updateWidths();
}
