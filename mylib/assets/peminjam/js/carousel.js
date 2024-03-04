var container = document.querySelector('.unggulan-content-container');
var prevBtn = document.getElementById('prevBtn');
var nextBtn = document.getElementById('nextBtn');
var cards = document.querySelectorAll('.unggulan-card');
var cardCount = cards.length;
var cardWidth = cards[0].offsetWidth;
var currentIndex = 0;
var maxVisibleCards = calculateMaxVisibleCards();
var cardContents = [];

// Save initial card contents
cards.forEach(function (card) {
    cardContents.push(card.innerHTML);
});

function updateCardVisibility() {
    cards.forEach(function (card, index) {
        if (index < currentIndex || index >= currentIndex + maxVisibleCards) {
            card.style.display = 'none';
        } else {
            card.style.display = 'block';
            card.innerHTML = cardContents[index];
        }
    });
}

function showNext() {
    if (currentIndex < cardCount - 1 && currentIndex < cardCount - maxVisibleCards) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }

    container.style.transform = 'translateX(' + (-currentIndex * cardWidth) + 'px)';
    updateCardVisibility();

    // Activate the "Prev" button if it was previously disabled
    prevBtn.disabled = false;
}

function showPrev() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = cardCount - maxVisibleCards;
    }

    container.style.transform = 'translateX(' + (-currentIndex * cardWidth) + 'px)';
    updateCardVisibility();

    // Activate the "Next" button if it was previously disabled
    nextBtn.disabled = false;
}

function calculateMaxVisibleCards() {
    return window.innerWidth <= 600 ? 2 : 5;
}

function handleResize() {
    var newMaxVisibleCards = calculateMaxVisibleCards();

    // Check if the maxVisibleCards has changed
    if (newMaxVisibleCards !== maxVisibleCards) {
        maxVisibleCards = newMaxVisibleCards;
        updateCardVisibility();
    }
}

// Initialize the visibility of the first set of cards
updateCardVisibility();

// Add event listeners for the next/prev buttons
nextBtn.addEventListener('click', showNext);
prevBtn.addEventListener('click', showPrev);

// Add event listener for window resize
window.addEventListener('resize', handleResize);



