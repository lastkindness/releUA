document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.tabs')) {
        const tabs = document.querySelectorAll('.tabs__nav li');
        const tabContent = document.querySelectorAll('.tabs__content-item');
        const contentContainer = document.querySelector('.tabs__content');

        tabs[0].classList.add('active');
        tabContent[0].classList.add('active');

        const height = tabContent[0].clientHeight;
        contentContainer.style.height = `${height}px`;

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tabs.forEach((tab) => tab.classList.remove('active'));
                tabContent.forEach((content) => content.classList.remove('active'));
                tab.classList.add('active');
                tabContent[index].classList.add('active');

                const height = tabContent[index].clientHeight;
                contentContainer.style.height = `${height}px`;
            });
        });

        window.addEventListener('resize', () => {
            const activeContent = document.querySelector('.tabs__content-item.active');
            const height = activeContent.clientHeight + parseInt(window.getComputedStyle(activeContent).marginTop) + parseInt(window.getComputedStyle(activeContent).marginBottom);
            contentContainer.style.height = `${height}px`;
        });
    }
});