$(document).ready(function () {
  // Hide the reviews section initially
  $(".section-for-review").hide();

  $("#toggleSections").click(function () {
    $(".section-for-reviews, .section-for-review").toggle();
  });
});