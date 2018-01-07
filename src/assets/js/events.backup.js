$(document).ready(function(){

  //- get events data
  $.get("https://sheetsu.com/apis/v1.0/2a231527", function(data) {
    //- Remove loading message
    $('.js-events__loading').remove();
    var today = new Date();
    today.setDate(today.getDate() - 1);

    if (data.length > 0) {
      var validDates = 0;
      $.each(data, function(i, evnt) {
        var eventDate = new Date(evnt.date);

        if (eventDate > today) {
          $('.js-events').append('<div class="event">' +
            '<div class="event__header"><strong>' + evnt.date + '</strong></div>' +
            '<div class="event__detail"><div class="event__label">Event:</div> <div class="event__value">' + evnt.name + '</div></div>' +
            '<div class="event__detail"><div class="event__label">Sponsor:</div> <div class="event__value">' + evnt.sponsor + '</div></div>' +
            '<div class="event__detail"><div class="event__label">Location:</div> <div class="event__value">' + evnt.location + '</div></div>' +
            '<div class="event__detail"><div class="event__label">Topic:</div> <div class="event__value">' + evnt.topic + '</div></div>' +
            '<div class="event__detail"><div class="event__label">Speaker:</div> <div class="event__value">' + evnt.speaker + '</div></div>' +
            '</div>');
            validDates =  validDates + 1;
        }
      });
      if (validDates === 0) {
        $('.js-events').append('<p>Sorry, it looks like Inquirehire has no upcoming events.</p>');
      }
    } else {
      $('.js-events').append('<p>Sorry, it looks like Inquirehire has no upcoming events.</p>');
    }

  });
});
