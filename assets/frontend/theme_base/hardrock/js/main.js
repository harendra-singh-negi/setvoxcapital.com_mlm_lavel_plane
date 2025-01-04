/*----------------------------------------*/
/* Investify main jQuery
/*----------------------------------------*/

(function ($) {
  'use strict';

  // Preloder activation
  $(window).on('load', function (event) {
    $('#preloader').delay(500).fadeOut(500);
  });

  // Mobile menu
  if ($("#mobile-menu").length > 0) {
    $("#mobile-menu").meanmenu({
      meanMenuContainer: ".mobile-menu",
      meanScreenWidth: "991",
      meanExpand: ['<i class="fa-regular fa-angle-right"></i>'],
    });
  }

  // Sidebar Toggle
  $(".offcanvas-close,.offcanvas-overlay").on("click", function () {
    $(".offcanvas-area").removeClass("info-open");
    $(".offcanvas-overlay").removeClass("overlay-open");
  });
  $(".sidebar-toggle").on("click", function () {
    $(".offcanvas-area").addClass("info-open");
    $(".offcanvas-overlay").addClass("overlay-open");
  });

  //Body overlay Js
  $(".body-overlay").on("click", function () {
    $(".offcanvas-area").removeClass("opened");
    $(".body-overlay").removeClass("opened");
  });

  // Header sticky
  $(window).scroll(function () {
    if ($(this).scrollTop() > 250) {
      $("#header-sticky").addClass("active-sticky");
    } else {
      $("#header-sticky").removeClass("active-sticky");
    }
  });

  // Nice Select
  $('.single-input select').niceSelect();
  $('.input-select select').niceSelect();
  $('.filter-length-select select').niceSelect();

  // Data Css js
  $("[data-background").each(function () {
    $(this).css(
      "background-image",
      "url( " + $(this).attr("data-background") + "  )"
    );
  });

  $("[data-width]").each(function () {
    $(this).css("width", $(this).attr("data-width"));
  });

  $("[data-bg-color]").each(function () {
    $(this).css("background-color", $(this).attr("data-bg-color"));
  });

  // Dashboard sticky
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $("#dashboard-sticky").addClass("dashboard-sticky");
    } else {
      $("#dashboard-sticky").removeClass("dashboard-sticky");
    }
  });

  // customAlert
  document.addEventListener('DOMContentLoaded', function () {
    const alerts = document.querySelectorAll('.customAlert');

    alerts.forEach(alert => {
      const laterBtn = alert.querySelector('.outline-opcity-btn.radius-10.rock-btn-close');

      const closeAlert = () => {
        alert.classList.add('hide');
        alert.addEventListener('transitionend', () => {
          alert.style.display = 'none';
        }, { once: true });
      };
      laterBtn.addEventListener('click', closeAlert);
    });
  });

  // Notifications dropdown
  document.addEventListener('DOMContentLoaded', () => {
    const notificationsDropBtn = document.querySelector('.notifications-drop-btn');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const langToggle = document.getElementById('header-lang-toggle');
    const langList = document.getElementById('language-list');
    const langOptions = langList ? langList.querySelectorAll('a') : [];

    if (notificationsDropBtn && dropdownMenu) {
      // Toggle dropdown visibility on button click
      notificationsDropBtn.addEventListener('click', function (event) {
        event.stopPropagation();
        dropdownMenu.classList.toggle('show');
      });

      // Hide notifications dropdown if clicked outside of it
      document.addEventListener('click', function (event) {
        if (!dropdownMenu.contains(event.target) && !notificationsDropBtn.contains(event.target)) {
          dropdownMenu.classList.remove('show');
        }
      });
    }

    if (langToggle && langList) {
      langToggle.addEventListener('click', (event) => {
        event.stopPropagation();
        langList.classList.toggle('lang-list-open');
      });

      // Hide language dropdown if clicked outside of it
      document.addEventListener('click', (event) => {
        if (!langToggle.contains(event.target) && !langList.contains(event.target)) {
          langList.classList.remove('lang-list-open');
        }
      });
    }

    // Hide any dropdown if clicked outside of it
    document.addEventListener('click', function (event) {
      if (dropdownMenu && !dropdownMenu.contains(event.target) && !notificationsDropBtn.contains(event.target)) {
        dropdownMenu.classList.remove('show');
      }

      if (langToggle && langList && !langToggle.contains(event.target) && !langList.contains(event.target)) {
        langList.classList.remove('lang-list-open');
      }
    });
  });

  // Backtotop js
  if ($(".backtotop-wrap path").length > 0) {
    var progressPath = document.querySelector(".backtotop-wrap path");
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "stroke-dashoffset 10ms linear";
    var updateProgress = function () {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var progress = pathLength - (scroll * pathLength) / height;
      progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 150;
    var duration = 550;
    jQuery(window).on("scroll", function () {
      if (jQuery(this).scrollTop() > offset) {
        jQuery(".backtotop-wrap").addClass("active-progress");
      } else {
        jQuery(".backtotop-wrap").removeClass("active-progress");
      }
    });
    jQuery(".backtotop-wrap").on("click", function (event) {
      event.preventDefault();
      jQuery("html, body").animate({
        scrollTop: 0
      }, duration);
      return false;
    });
  }

  // Customer review slider
  if ($(".customer-review-slider-active").length > 0) {
    var customerReviewSlider = new Swiper(".customer-review-slider-active", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 3000,
      },
      pagination: {
        el: ".td-swiper-dot",
        clickable: true,
      },
      breakpoints: {
        1200: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 3,
        },
        768: {
          slidesPerView: 2,
        },
        576: {
          slidesPerView: 1,
        },
        0: {
          slidesPerView: 1,
        },
      },
    });
  }

  // Customer review slider
  if ($(".rock-blog-active").length > 0) {
    var rockBlog = new Swiper(".rock-blog-active", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 3000,
      },
      navigation: {
        nextEl: ".blog-slider-next",
        prevEl: ".blog-slider-prev",
      },
      pagination: {
        el: ".td-swiper-dot",
        clickable: true,
      },
      breakpoints: {
        '1200': {
          slidesPerView: 3,
        },
        '992': {
          slidesPerView: 3,
        },
        '768': {
          slidesPerView: 2,
        },
        '576': {
          slidesPerView: 1,
        },
        '0': {
          slidesPerView: 1,
        },
      },
    });
  }

  // brand slider
  if ($(".brand-active").length > 0) {
    var brandSlider = new Swiper('.brand-active', {
      slidesPerView: "auto",
      spaceBetween: "auto",
      freeMode: true,
      loop: true,
      allowTouchMove: false,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
      spaceBetween: 32,
      speed: 10000,
      slidesPerView: 7,
      breakpoints: {
        '1200': {
          slidesPerView: 7,
        },
        '992': {
          slidesPerView: 4,
        },
        '768': {
          slidesPerView: 3,
        },
        '576': {
          slidesPerView: 2,
        },
        '0': {
          slidesPerView: 2,
        },
      },
    });
  }

  // Payment slider
  if ($(".rock-payment-slider").length > 0) {
    var rockpaymentSlider = new Swiper(".rock-payment-slider", {
      loop: true,
      freemode: true,
      slidesPerView: 8,
      spaceBetween: 25,
      allowTouchMove: false,
      speed: 5000,
      autoplay: {
        delay: 1,
        disableOnInteraction: true,
      },
      breakpoints: {
        '1200': {
          slidesPerView: 7,
        },
        '992': {
          slidesPerView: 4,
        },
        '768': {
          slidesPerView: 3,
        },
        '576': {
          slidesPerView: 3,
        },
        '0': {
          slidesPerView: 2,
        },
      },
    });
  }

  if ($(".rock-payment-slider-two").length > 0) {
    var rockPaymentSliderTwo = new Swiper(".rock-payment-slider-two", {
      loop: true,
      freemode: true,
      slidesPerView: 7,
      spaceBetween: 25,
      centeredSlides: true,
      allowTouchMove: false,
      speed: 5000,
      autoplay: {
        delay: 1,
        disableOnInteraction: true,
        reverseDirection: true,
      },
      breakpoints: {
        '1200': {
          slidesPerView: 7,
        },
        '992': {
          slidesPerView: 4,
        },
        '768': {
          slidesPerView: 3,
        },
        '576': {
          slidesPerView: 3,
        },
        '0': {
          slidesPerView: 2,
        },
      },
    });

  }

  // Odometer active
  var odo = $('.odometer');
  odo.each(function () {
    $('.odometer').appear(function (e) {
      var countNumber = $(this).attr('data-count');
      $(this).html(countNumber);
    });
  });

  // Datepicker active
  if ($('#d_today').length) {
    (function () {
      const d_today = new Datepicker(document.querySelector('#d_today'), {
        buttonClass: 'btn',
        todayHighlight: true
      });
    })()
  }

  // Image Preview
  $(document).on('change', 'input[type="file"]', function (event) {
    var $file = $(this),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      labelDefault = $labelText.text();

    var fileName = $file.val().split('\\').pop(),
      tmppath = URL.createObjectURL(event.target.files[0]);

    // Check successfully selection
    if (fileName) {
      $label.addClass('file-ok').css('background-image', 'url(' + tmppath + ')');
      $labelText.text(fileName);
    } else {
      $label.removeClass('file-ok');
      $labelText.text(labelDefault);
    }
  });

})(jQuery);
