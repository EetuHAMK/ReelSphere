$(document).ready(function () {
  $('#search').on('input', function () {
    var query = $(this).val();

    if (query !== '') {
      $.ajax({
        url: 'user-search-live.php?q=' + query,
        type: 'GET',
        success: function (data) {
          $('#search-results-users').html(data).find('.user-item').hide().fadeIn(500);
        }
      });
    } else {
      $('#search-results-users').empty();
    }
  });
});