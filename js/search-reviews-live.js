$(document).ready(function () {
  $('#search').on('input', function () {
    var query = $(this).val();

    if (query !== '') {
      $.ajax({
        url: 'review-search-live.php?q=' + query,
        type: 'GET',
        success: function (data) {
          $('#search-results-reviews').html(data).find('.review-item').hide().fadeIn(500);
        }
      });
    } else {
      $('#search-results-reviews').empty();
    }
    
  });
});
