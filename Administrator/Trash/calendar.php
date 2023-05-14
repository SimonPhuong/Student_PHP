<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./calendar/dist/index.global.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridWeek'
        });
        calendar.render();
      });

    </script>
    <title>Document</title>
</head>
<body>
    <h1 style: align="center">Timetable</h1>
    <div>
        <div id="calendar"></div>
    </div>
</body>
</html>