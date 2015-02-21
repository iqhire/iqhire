$(document).ready(function(){
  $(".nav__item").click(function(){
    $(this).toggleClass("is-open");
    return false;
  });
});
