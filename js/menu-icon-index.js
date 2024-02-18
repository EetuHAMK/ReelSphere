// PATH TO THE ANIMATION .JSON FILE:
const animationPath = 'media/icons/menu/menu.json';

// DIV ID:
const container = document.getElementById('menu-icon');

// ANIMATION RULES:
const animation = lottie.loadAnimation({
  container: container,
  renderer: 'svg',
  loop: false,
  autoplay: false,
  path: animationPath,
});

let IconState = true;

// WHEN CLICKED: ...
container.addEventListener('click', toggleAnimationState);

// .. METHOD GETS CALLED:
function toggleAnimationState() {

  // ANIMATION TOGGLE:
  if (IconState) {
    // OPEN:
    animation.setDirection(1);
    animation.play();
  } else {
    // CLOSE:
    animation.setDirection(-1);
    animation.play();
  }
  // TOGGLES THE STATE:
  IconState = !IconState;
}
