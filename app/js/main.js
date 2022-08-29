$(document).ready(function(){
    $("#blocktoshow").hide();
  $("#button-change").click(function(){
    $("#blocktoshow").show();
    $('#button-change').hide();
  });

  // Admin Panel Side bar activity changing
  $('.control-panel__list-link').click(function(){
    $('.control-panel__list-link').removeClass('control-panel__list-link--active');
    $(this).addClass('control-panel__list-link--active');
  });
  
  });


  //control-panel__list-link control-panel__inner-link control-panel__inner-link--active