// sticky top navbar on scroll
$(window).on('scroll',function(){
    if($(window).scrollTop()>100){
        $('nav').addClass('scroll');
        $('nav .navbar-brand').addClass('d-xl-block');
        $('.collapse').addClass('justify-content-xl-end');
        $('.navbar-nav li').addClass('mx-xl-2');

    }
    else{
        $('nav').removeClass('scroll');
        $('nav .navbar-brand').removeClass('d-xl-block');
        $('.collapse').removeClass('justify-content-xl-end');
        $('.navbar-nav li').removeClass('mx-xl-2');
    }
    

    // scroll-up button
    var btn = $('#button');
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  })

  $('#button').on('click', function() {
    $('html, body').animate({scrollTop: 0}, '800');
  });

// search button
$('a[href="#search"]').on('click', function(event) {
    event.preventDefault();
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
    //prevent scrolling when open
    $('html, body').css({
      overflow: 'hidden',
      height: '100%'
    });
});

$('#search, #search button.close').on('click keyup', function(event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
        $(this).removeClass('open');
    }
    //allow scrolling after closing
    $('html, body').css({
      overflow: 'auto',
      height: 'auto'
    });
});

// preloader
$(window).on('load',function() { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(50).fadeOut(100); // will fade out the white DIV that covers the website.
    $('body').delay(50).css({'overflow':'visible'});
})

// odometer
$.fn.isInViewport = function() {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();

  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();

  return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('resize scroll', function() {
    if (typeof odometer1 !== "undefined") {
      if ($('#odometer1').isInViewport()) {
        setTimeout(function(){
          odometer1.innerHTML = 90;
        }, 0)
      }
    }
    if (typeof odometer2 !== "undefined") {
      if ($('#odometer2').isInViewport()) {
        setTimeout(function(){
          odometer2.innerHTML = 1;
        }, 0)
      }
    }
    if (typeof odometer3 !== "undefined") {
      if ($('#odometer3').isInViewport()) {
        setTimeout(function(){
          odometer3.innerHTML = 100000;
        }, 0)
      }
    }
});

// form validdation

$("form[name='get-in-touch']").validate({
  rules: {
    fullname: "required",
    phone: {
      required: true,
      digits: true,
      number: true,
    },
    email: {
      email: true
    },
    password: {
      required: true,
      minlength: 5
    }
  },  
  // Make sure the form is submitted to the destination defined
  // in the "action" attribute of the form when valid
  submitHandler: function(form) {
    $('#form-modal').modal('show');
    // form.submit();
  }
});

$("#form-textarea").on('keyup', function() {
  var words = 0;

  if ((this.value.match(/\S+/g)) != null) {
    words = this.value.match(/\S+/g).length;
  }

  if (words > 50) {
    // Split the string on first 200 words and rejoin on spaces
    var trimmed = $(this).val().split(/\s+/, 50).join(" ");
    // Add a space at the end to make sure more typing creates new words
    $(this).val(trimmed + " ");
  }
  else {
    $('#display_count').text(words);
    $('#word_left').text(50-words);
  }
});

// footer menus collapse-expand
if($(window).width() > 576)
{
  $('.footer-menu').addClass('show');
  $('.footer-menu').removeClass('collapse');

}
else 
{
  $('.footer-menu').removeClass('show');
  $('.footer-menu').addClass('collapse');
}