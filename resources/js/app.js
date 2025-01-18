import './bootstrap';

// highlight js pre code style design function

document.querySelectorAll('pre').forEach(function(preElement) {
    if (!preElement.querySelector('code')) {
        const codeElement = document.createElement('code');
        codeElement.innerHTML = preElement.innerHTML;
        preElement.innerHTML = '';
        preElement.appendChild(codeElement);
    }
});

// Trigger Highlight.js on all code blocks
hljs.highlightAll();

// End highlight js pre code style design function


// Fancy box code for image zoom in zoom out in the post->body in the view.blade.php
Fancybox.bind("[data-fancybox='gallery']", {
    // Optional settings for Fancybox
    infinite: false,      // Disable infinite loop
    toolbar: "auto",      // Show toolbar only when hovering over the image
    arrows: true,         // Enable arrows for navigation
});
// End Fancy box code for image zoom in zoom out in the post->body  in the view.blade.php