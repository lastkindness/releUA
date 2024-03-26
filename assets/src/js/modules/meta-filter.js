jQuery(function () {
    metaFilter();
});

function metaFilter () {
    // Get the range inputs and number input elements
    var minRange = document.getElementById('room-area-min');
    var maxRange = document.getElementById('room-area-max');
    var minInput = document.getElementById('room-area-min-value');
    var maxInput = document.getElementById('room-area-max-value');
    var startOuter = document.querySelector('.price-outer_start');
    var endOuter = document.querySelector('.price-outer_end');
    var rangeBg = document.querySelector('.range_bg');

// Update the range input values when the number input values change
    minInput.addEventListener('input', function() {
        minRange.value = minInput.value;
    });

    maxInput.addEventListener('input', function() {
        maxRange.value = maxInput.value;
    });

// Update the number input values when the range input values change
    minRange.addEventListener('input', function() {
        minInput.value = minRange.value;
    });

    maxRange.addEventListener('input', function() {
        maxInput.value = maxRange.value;
    });

// Update the width of the start and end background elements based on the range values
    function updateWidths() {
        var min = parseInt(minRange.value);
        var max = parseInt(maxRange.value);
        var total = parseInt(maxRange.max);

        var startWidth = (min / total) * 100 + '%';
        var endWidth = ((total - max) / total) * 100 + '%';

        startOuter.style.width = startWidth;
        endOuter.style.width = endWidth;

        rangeBg.style.left = startWidth;
        rangeBg.style.width = 'calc(' + (100 - parseInt(startWidth)) + '% - ' + endWidth + ')';
    }

// Add event listeners to the range inputs
    minRange.addEventListener('input', updateWidths);
    maxRange.addEventListener('input', updateWidths);

// Initial call to set widths
    updateWidths();
}
