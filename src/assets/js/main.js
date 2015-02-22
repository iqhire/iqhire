$(document).ready(function(){
  $(".nav-section").click(function(){
    $(this).find(".nav-sub").toggleClass("is-open");
    return false;
  });

  $(".nav-menu").click(function(){
    $(this).toggleClass("is-open");
    $(".nav-sections").toggleClass("is-open");
  });
});
