$( window ).resize(function() {
  $(function () {
    viewport = $(window).width();
    if (viewport > 768 && !$('.nav').hasClass('active')) {
      $('.nav').slideDown('active');
    }
  });
});

$(document).ready(function () {
  $('.menu-trigger').click(function() {
    if ($('.nav').hasClass('active') === true) {
      $('.nav').slideUp();
      $('.nav').removeClass('active');
    }
    else {
      $('.nav').slideDown();
      $('.nav').addClass('active');
    }

  })
});