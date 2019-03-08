$(document).ready(function () {
  $('.owl-slider').owlCarousel ({
    autoplay: true,
    items: 1,
    loop: true,
    margin: 10,
    nav: false
  });

  $('.guide-slider').owlCarousel ({
    autoplay: true,
    margin: 0,
    loop: true,
    autoWidth: true,
    items: 3
  });

  $('.gr-slider').owlCarousel({
    autoplay: false,
    items: 1,
    loop: true,
    margin: 10,
    nav: false
  });

  $('.js-provincial-single').select2();

  $('.js-language-single').select2();

  $('.js-location').select2();

  $(".info-nav .link-list a").click(function (e) {
    e.preventDefault();
    goToByScroll($(this).attr("id"));
  });

  $('.owl-comment-slider').owlCarousel({
    autoplay: true,
    items: 1,
    loop: true,
    margin: 10,
    nav: false
  });

  $('.js-job-single').select2();

  $('.js-place-single').select2();

  /* Blog slider */
  $('.blog-slider').owlCarousel({
    autoplay: true,
    margin: 15,
    loop: true,
    items: 3,
    dots: false,
    nav: true,
    responsive: {
      0: {
        autoWidth: false,
        items: 1
      },
      479: {
        autoWidth: true,
      }
    }
  });

  $('.mobile-toggle-btn').on('click', function () {
    if ($(this).hasClass('open')) {
      $(this).removeClass('open');
      $('.mobile-nav').stop(!0, !0).slideUp();
      $(document).unbind('touchstart', event_header_menu);
    } else {
      $(this).addClass('open');
      $('.mobile-nav').stop(!0, !0).slideDown();
      $(document).bind('touchstart', event_header_menu);
    }
  });

  $('.mobile-nav').accordion ({
    accordion: false,
    speed: 300,
    closedSign: '+',
    openedSign: '-'
  });
});

function goToByScroll(id) {
  var id = id.replace("link", "");
  $('html,body').animate({
    scrollTop: $("#" + id).offset().top
  }, 'slow');
}

function event_header_menu(i) {
  var btn_dropdown = $('.mobile-toggle-btn');
  var menu_dropdown = $('.mobile-nav');
  if (!btn_dropdown.is(i.target) && menu_dropdown.has(i.target).length <= 0) {
    btn_dropdown.removeClass('open');
    menu_dropdown.stop(!0, !0).slideUp();
    $(document).unbind('touchstart', event_header_menu);
  }
}