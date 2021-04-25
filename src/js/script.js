$(window).on('scroll',function(){
    if($(window).scrollTop()>70){
        $('nav').addClass('scroll');
        $('nav .navbar-brand').removeClass('d-md-none');
        $('nav .navbar-brand').addClass('mx-5');
        $('nav ul').addClass('ml-5');

    }
    else{
        $('nav').removeClass('scroll');
        $('nav .navbar-brand').addClass('d-md-none');
        $('nav .navbar-brand').removeClass('mx-5');
        $('nav ul').removeClass('ml-5');
    }
    //console.log($(window).scrollTop())
})
