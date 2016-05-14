$(document).ready(function(){

  //- Navigation
  $(".js-nav-section > a").click(function(){
    var isOpen = $(this).next().hasClass("is-open");

    $(".js-nav-sub").removeClass("is-open");

    if (!isOpen) {
      $(this).next().addClass("is-open");
    }
    return false;
  });

  $(".js-nav-menu").click(function(){
    $(this).toggleClass("is-open");
    $(".js-nav-sections").toggleClass("is-open");
  });


});
