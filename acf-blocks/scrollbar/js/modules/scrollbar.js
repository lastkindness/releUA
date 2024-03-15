import SimpleBar from 'simplebar';
import ResizeObserver from 'resize-observer-polyfill';

document.addEventListener('DOMContentLoaded', function () {
    window.ResizeObserver = ResizeObserver;

    Array.prototype.forEach.call(
        document.querySelectorAll('.scrollbar__wrap'),
        (el) => new SimpleBar(el)
    );
});

