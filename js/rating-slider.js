$(document).ready(function() {
  const ratingSlider = $('#ratingSlider');
  const ratingFill = $('<div class="rating-fill"></div>');
  
  ratingSlider.append(ratingFill);

  ratingSlider.on('mousedown', function(e) {
    handleSliderMove(e);
    $(document).on('mousemove', handleSliderMove);
    $(document).on('mouseup', function() {
      $(document).off('mousemove', handleSliderMove);
    });
  });

  function handleSliderMove(e) {
    const sliderWidth = ratingSlider.width();
    const offsetX = e.pageX - ratingSlider.offset().left;
    const percentage = (offsetX / sliderWidth) * 100;

    if (percentage >= 0 && percentage <= 100) {
      ratingFill.width(percentage + '%');
      const ratingValue = Math.round((percentage / 10) * 2) / 2;
      $('#rating').val(ratingValue);
    }
  }
});
