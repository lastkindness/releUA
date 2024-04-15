jQuery(function () {
    var filterTitle = document.querySelector('.estate-filter__main-title');
    var handorgel = document.querySelector('.handorgel');
    if (filterTitle) {
        openMobileFilters(filterTitle, handorgel);
    }
});

function openMobileFilters (filterTitle, handorgel) {
    handorgel.style.display = 'none';
    filterTitle.addEventListener('click', function() {
        if (handorgel.style.display === 'none') {
            handorgel.style.display = 'block';
        } else {
            handorgel.style.display = 'none';
        }
    });
}
