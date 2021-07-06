$(document).ready(function() {

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        displayEventTime: false,
        editable: true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        dayClick: function(event) {
            window.location.href = "/";
        }

    });

});