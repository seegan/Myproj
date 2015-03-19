var num = 50; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num && window.innerWidth>990) {
        $('header').addClass('fixed');
        
    } else {
        $('header').removeClass('fixed');
    }
});

$(document).ready(function(){
    var counter=1;
    $(".btn-menu").click(function(){
        if (counter == 1) {
        $('header').animate({left:'0'});   
        counter=0;
    }else
    {
        counter=1;
        $('header').animate({left:'-100%'}); 
    }
    });
});

$(document).ready(function(){
$('header nav ul li a').on('click', function() {
    $('header nav ul li a').removeClass('active');
    $(this).addClass('active');
});
});
    
$(document).ready(function(){
    $("input:radio[name=ClientType]").click(function() {
    var value = $(this).val();
    if (value==0)
     {
        $(".individual-block").css("display", "none");
        $(".company-block").css("display", "block");
     }
     else
     {
        $(".company-block").css("display", "none");
        $(".individual-block").css("display", "block");
     }
    });
});

