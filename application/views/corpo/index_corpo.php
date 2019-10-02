<div class="container-fluid">
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset='utf-8' />
<link href='<?php echo base_url(); ?>calendar/packages/core/main.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>calendar/packages/daygrid/main.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>calendar/packages/timegrid/main.css' rel='stylesheet' />
<script src='<?php echo base_url(); ?>calendar/packages/core/main.js'></script>
<script src='<?php echo base_url(); ?>calendar/packages/interaction/main.js'></script>
<script src='<?php echo base_url(); ?>calendar/packages/daygrid/main.js'></script>
<script src='<?php echo base_url(); ?>calendar/packages/timegrid/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGridWeek'
      },
      defaultDate: '2019-09-30',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
       
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 0px 0px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>
</div>