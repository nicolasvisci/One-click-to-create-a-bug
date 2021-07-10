<!DOCTYPE html>
<html>
<style>

span {
  transition: background-size .5s, background-position .3s ease-in .5s;
}
span:hover {
  transition: background-position .5s, background-size .3s ease-in .5s;
}
span {
  background-image: linear-gradient(#222, #222);
  background-repeat: no-repeat;
  background-position: 0% 100%;
  background-size: 100% 0px;
  border-radius: 10px 10px 10px 10px;
}
span:hover {
  background-size: 100% 100%;
  background-position: 0% 0%;
}

h2 { color: white;
font-family: 'Helvetica Neue', sans-serif; 
font-size: 40px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
text-align: center; 
}

</style>
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!--fullcalendar plugin files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    
</head>
<body>
  
<div class="container">
    <h2 style="text-align: center"><span class="w3-margin w3-jumbo w3-text-white Title">CALENDARIO</span></h2>
    <div id="calendar"></div>
</div>
   
<script>
    var site_url = "<?= site_url() ?>";

    $(document).ready(function() {

        var calendar = $('#calendar').fullCalendar({
            
            displayEventTime: false,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            selectHelper: true,

            dayClick: function(event) {
                var date = convert(event['_d']);
                $.ajax({
                    url:"/getDate",
                    type: 'POST',
                    data: {date},
                    dataType: "json",
                    success: function(res){
                        window.location.href = "/history_lab";
                    }
        })
                console.log(convert(event['_d']));
                //window.location.href = "/calendario";
            }
        });
    });

    function convert(str) {
        var date = new Date(str);
        month = ("0" + (date.getMonth() + 1)).slice(-2);
        day = ("0" + date.getDate()).slice(-2);
        return [date.getFullYear(), month, day].join("-");
    }   

</script>



</body>
</html>