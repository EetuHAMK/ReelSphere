let isScrollEnabled = false;
let startX;

function enableHorizontalScroll(container) {
  if (container) {
    isScrollEnabled = true;
    container.style.overflowX = 'auto';
  }
}

function disableHorizontalScroll(container) {
  if (container) {
    isScrollEnabled = false;
    container.style.overflowX = 'hidden';
  }
}

function handleTouchStart(event) {
  startX = event.touches[0].clientX;
}

function handleTouchMove(container, event) {
  if (isScrollEnabled) {
    const currentX = event.touches[0].clientX;
    const deltaX = startX - currentX;

    container.scrollLeft += deltaX;
    startX = currentX;

    event.preventDefault();
  }
}

document.querySelectorAll('.scrollable-container').forEach(container => {
  container.addEventListener('mouseover', () => enableHorizontalScroll(container));
  container.addEventListener('mouseout', () => disableHorizontalScroll(container));

  container.addEventListener('wheel', function (event) {
    if (isScrollEnabled) {
      // Adjust the divisor to control the scrolling sensitivity
      const scrollAmount = event.deltaY / 0.5; // You can change the divisor as needed
      container.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
      });

      event.preventDefault();
  }
  });

  container.addEventListener('touchstart', event => handleTouchStart(event));
  container.addEventListener('touchmove', event => handleTouchMove(container, event));
  container.addEventListener('touchend', () => startX = null);
});
