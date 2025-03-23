jQuery(function () {
    langSwitcher();
});

function langSwitcher() {
    var langSwitcher = document.querySelector('.wpml-ls-sidebars-header_lang_switcher');
    if (langSwitcher) {
        var langItems = langSwitcher.querySelectorAll('.wpml-ls-item');
        langItems.forEach(function(item) {
            var langDisplay = item.querySelector('.wpml-ls-display');
            if (langDisplay) {
                var langAbbreviation = langDisplay.textContent.trim();
                switch (langAbbreviation) {
                    case 'Ukrainian':
                        langDisplay.textContent = 'UA';
                        break;
                    case 'Russian':
                        langDisplay.textContent = 'RU';
                        break;
                    case 'English':
                        langDisplay.textContent = 'EN';
                        break;
                    case 'Украинский':
                        langDisplay.textContent = 'UA';
                        break;
                    case 'Русский':
                        langDisplay.textContent = 'RU';
                        break;
                    case 'Английский':
                        langDisplay.textContent = 'EN';
                        break;
                    default:
                        break;
                }
            }
        });
        var langNative = langSwitcher.querySelector('.wpml-ls-native');
        var langAbbreviationNative = langNative.textContent.trim();
        if (langAbbreviationNative) {
            switch (langAbbreviationNative) {
                case 'Ukrainian':
                    langNative.textContent = 'UA';
                    break;
                case 'Russian':
                    langNative.textContent = 'RU';
                    break;
                case 'English':
                    langNative.textContent = 'EN';
                    break;
                case 'Украинский':
                    langNative.textContent = 'UA';
                    break;
                case 'Русский':
                    langNative.textContent = 'RU';
                    break;
                case 'Английский':
                    langNative.textContent = 'EN';
                    break;
                default:
                    break;
            }
        }
    }
}
