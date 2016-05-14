$(document).ready(function(){
  //- Home Page Hero
  $(".js-hero-menu-item").click(function(){
    $(".js-hero-menu-item").removeClass("is-selected");
    $(this).addClass("is-selected");

    if ($(this).hasClass("js-hero-menu-item--attract")) {
      changeHeroBackground("attract");
      changeHeroContent("attract");
    } else if ($(this).hasClass("js-hero-menu-item--avoid")) {
      changeHeroBackground("avoid");
      changeHeroContent("avoid");
    } else if ($(this).hasClass("js-hero-menu-item--streamline")) {
      changeHeroBackground("streamline");
      changeHeroContent("streamline");
    } else {
      console.log("error :(");
    }

    return false;
  });

  //- Home Page Quotes
  setInterval(function(){

    var quote = $(".js-quote.is-showing").removeClass('is-showing');

    if (quote.next() && quote.next().length) {
      quote.next().addClass("is-showing");
    } else {
      quote.siblings(":first").addClass("is-showing");
    }
  }, 9000)
});

function changeHeroBackground(hero) {
  $(".js-hero-background").removeClass("is-showing--attract is-showing--avoid is-showing--streamline");
  $(".js-hero-background").addClass("is-showing--"+hero);
}

function changeHeroContent(hero) {
  $(".js-hero").removeClass("is-showing");
  $(".js-hero--"+hero).addClass("is-showing");
}
