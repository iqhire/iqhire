$(document).ready(function(){
  $(".js-nav-section > a").click(function(){
    $(this).next().toggleClass("is-open");
    return false;
  });

  $(".js-nav-menu").click(function(){
    $(this).toggleClass("is-open");
    $(".js-nav-sections").toggleClass("is-open");
  });
});
