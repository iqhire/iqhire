$(document).ready(function(){

  //- get events data
  $.get("https://sheetsu.com/apis/v1.0/2a231527", function(data) {
    //- Remove loading message
    $('.js-events__loading').remove();


    $.each(data, function(i, evnt) {
      //- Make Event Block
      $('.js-events').append('<div class="event">' +
        '<div class="event__header"><strong>' + evnt.date + '</strong></div>' +
        '<div class="event__detail"><div class="event__label">Event:</div> <div class="event__value">' + evnt.name + '</div></div>' +
        '<div class="event__detail"><div class="event__label">Sponsor:</div> <div class="event__value">' + evnt.sponsor + '</div></div>' +
        '<div class="event__detail"><div class="event__label">Location:</div> <div class="event__value">' + evnt.location + '</div></div>' +
        '<div class="event__detail"><div class="event__label">Topic:</div> <div class="event__value">' + evnt.topic + '</div></div>' +
        '<div class="event__detail"><div class="event__label">Speaker:</div> <div class="event__value">' + evnt.speaker + '</div></div>' +
        '</div>');
    });
  });
});
