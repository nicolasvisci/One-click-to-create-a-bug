$(document).ready(function() {

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: site_url + "/event",
        displayEventTime: false,
        editable: true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        eventRender: function(event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        dayClick: function(event) {
            window.location.href = "/";
        }

    });

});