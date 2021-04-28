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