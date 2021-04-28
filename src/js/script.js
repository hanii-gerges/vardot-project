$(window).on('scroll',function(){
    if($(window).scrollTop()>70){
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
    //console.log($(window).scrollTop())
})

$(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
});

//scroll-up button
var btn = $('#button');

$(window).on('scroll',function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


$(window).on('load',function() { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(50).fadeOut(100); // will fade out the white DIV that covers the website.
    $('body').delay(50).css({'overflow':'visible'});
    })