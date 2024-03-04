var textElement = document.getElementById('myText');
        var originalText = textElement.textContent;

        if (originalText.length > 40) {
            var truncatedText = originalText.substring(0, 40) + '...';
            textElement.textContent = truncatedText;
        }