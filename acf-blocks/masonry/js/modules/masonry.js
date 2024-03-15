import Masonry from 'masonry-layout/dist/masonry.pkgd.min';

document.addEventListener('DOMContentLoaded', () => {

    if (document.querySelector('.grid')) {
        const grid = document.querySelector('.grid');

        const masonry = new Masonry(grid, {
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            percentPosition: true,
            //horizontalOrder: true
        });
    }
});
