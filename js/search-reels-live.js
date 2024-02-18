$(document).ready(function () {
  $('#search').on('input', function () {
    var query = $(this).val();

    if (query !== '') {
      $.ajax({
        url: 'reel-search-live.php?q=' + query,
        type: 'GET',
        success: function (data) {
          $('#search-results-reels').html(data).find('.reel-item').hide().fadeIn(500);
        }
      });
    } else {
      $('#search-results-reels').empty();
    }
    
  });
});
