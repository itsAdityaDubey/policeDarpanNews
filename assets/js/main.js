
$(window).scroll(function() {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop < 50) {
        $('div#brandLogo').addClass('active').fadeIn();
        $('#brandLogoText').html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
    }
    else {
        $('div#brandLogo.active').removeClass('active').fadeOut();
        $('#brandLogoText').text("Police Darpan");
    }
});
if(window.matchMedia("(max-width: 767px)").matches){
var previous = 50;
$(window).scroll(function() {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if(previous<scrollTop){
        $('.bottomNav').css('paddingTop','27px');
        previous = scrollTop;
    }else{
        previous = scrollTop;
        $('.bottomNav').css('paddingTop','0px');
    }
});
};