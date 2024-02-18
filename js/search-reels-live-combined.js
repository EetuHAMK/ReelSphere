$(document).ready(function () {
  $('#search').on('input', function () {
    var query = $(this).val();

    if (query !== '') {
      $.ajax({
        url: 'reel-search-live.php?q=' + query,
        type: 'GET',
        success: function (data) {
          $('#search-results-reels-bottom').html(data).find('.reel-item').hide().fadeIn(1000);
          $('#search-results-reels-top').html(data).find('.reel-item').hide().fadeIn(1000);
        }
      });
    } else {
      $('#search-results-reels-bottom, #search-results-reels-top').empty();
    }
  });
});
