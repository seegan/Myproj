$(document).ready (main);
var counter=1;

function main()
{
  $('.btn-menu').click(function(){
    // $('nav').toggle();
    if (counter == 1) {
      
      $('.search_bar').animate({top:'-100%'},function(){
        $('.category_list').animate({right:'-100%'},function(){
          $('nav').animate({left:'0px'})
          ;});
      });
      counter=0;
    }else
    {
      counter=1;
      $('nav').animate({
        left:'-100%'
      });
      
      }
  });

    $('.btn-search').click(function(){
    // $('nav').toggle();
    if (counter == 1) {
      $('nav').animate({left:'-100%'},function(){
        $('.category_list').animate({right:'-100%'},function(){
          $('.search_bar').animate({top:'0px'})
          ;});
      });
      
      counter=0;
    }else
    {
      counter=1;
      $('.search_bar').animate({
        top:'-100%'
      });
      
    }
  });

    $('.btn-category').click(function(){
    // $('nav').toggle();
    if (counter == 1) {
      $('.search_bar').animate({top:'-100%'},function(){
        $('nav').animate({left:'-100%'},function(){
          $('.category_list').animate({right:'0px'})
          ;});
      });
      
      counter=0;
    }else
    {
      counter=1;
      $('.category_list').animate({
        right:'-100%'
      });
      
    }
  });

};

( function( $ ) {
$( document ).ready(function() {
$('#cssmenu > ul > li > a').click(function() {
  $('#cssmenu li').removeClass('active');
  $(this).closest('li').addClass('active'); 
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#cssmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false; 
  }   
});
});
} )( jQuery );

/*$(window).resize(function(){
  alert("width");
  if (width>800) {
    $("nav").removeAttr("style");
  }
  });*/

$(document).ready(function(){
  
  $(window).resize(function(){
    var width=window.innerWidth;
    if (width>993) {
    $("nav").removeAttr("style");
  }
  });
});