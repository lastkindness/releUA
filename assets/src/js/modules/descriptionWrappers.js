jQuery(function () {
    const descriptionWrapper = document.querySelectorAll('.description__wrapper');
    if(descriptionWrappers) {
        descriptionWrappers(descriptionWrapper)
    }
});

function descriptionWrappers(descriptionWrapper) {
    descriptionWrapper.forEach(wrapper => {
        const paragraphs = wrapper.querySelectorAll('p');
        if (paragraphs.length > 4) {
            const btn = wrapper.nextElementSibling;
            btn.style.display = 'block';
            btn.addEventListener('click', () => {
                wrapper.classList.toggle('open');
                btn.style.display = 'none';
            });
        }
    });
}
