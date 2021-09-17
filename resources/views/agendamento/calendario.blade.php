<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                themeSystem: 'bootstrap',
                plugins: [],
                headerToolbar: {
                    left: false,
                    center: 'title',
                    right: 'timeGridDay',
                },
                initialDate: new Date(),
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                  arg.jsEvent.preventDefault();
                  $('#exampleModalCenter').modal('show');
                  var teste = arg.start;
                  console.log(teste);
                    // if (check >= today) {
                    //     // Previous Day. show message if you want otherwise do nothing.
                    //     // So it will be unselectable
                    //     // $('#exampleModalCenter').modal('show');
                    // } else {
                    //     // Its a right date
                    //     // Do something
                    //     alert('AGENDAMENTO NÃO AUTORIZADO')
                    // }

                    calendar.unselect()
                },
                eventClick: function(arg) {
                  //arg.event.extendedProps.profissional
                  arg.jsEvent.preventDefault();
                  $('#profissional').val(arg.event.extendedProps.profissional);
                  $('#exampleModalCenter').modal('show');
                  
                },
                dateClick: function(arg) {
                  

                },

                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events:'/agendamento/buscar', 
            });

            calendar.render();
        });
    </script>
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 650px;
            margin: 0 auto;
        }

    </style>
</head>

<body>

    <div id='calendar'></div>   
    
</body>

</html>
