jQuery(function () {
    preViewUploadsPhotoInsert();
});

function preViewUploadsPhotoInsert () {
    // Function to handle the image insertion
    function insertImage(uploadStatusElement) {
        setTimeout(function () {
            const fileValue = uploadStatusElement.getElementsByTagName('input')[0].value;
            if(fileValue) {
                // Form the image source URL by appending the relative path
                const imageUrl = `./wp-content/uploads/2024/${fileValue}`;

                // Create a new <img> element
                const imgElement = document.createElement('img');
                imgElement.src = imageUrl;
                imgElement.alt = '';
                // Get the <div class="dnd-upload-image"> within the current upload status element
                const uploadImageDiv = uploadStatusElement.querySelector('.dnd-upload-image');

                // Get the <span class="file"> within the uploadImageDiv and clear its contents
                const fileSpan = uploadImageDiv.querySelector('span.file');
                fileSpan.innerHTML = '';

                // Append the imgElement to the fileSpan
                fileSpan.appendChild(imgElement);
            }
        }, 5000);
    }

// Callback function to be called when mutations are observed
    const mutationCallback = function(mutationsList, observer) {
        // Iterate over each mutation
        mutationsList.forEach(mutation => {
            // Check if nodes were added to the target node
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                // Check each added node
                mutation.addedNodes.forEach(node => {
                    insertImage(node);
                });
            }
        });
    };

// Get the parent element where mutations will be observed
    const parentElement = document.querySelector('.wpcf7-form-control-wrap[data-name="your-files"] .codedropz-upload-wrapper');

// Create a new MutationObserver instance
    const observer = new MutationObserver(mutationCallback);

// Define the configuration for the observer (watch for changes to the subtree)
    const config = { childList: true, subtree: true };

// Start observing changes on the parent element
    observer.observe(parentElement, config);

}
