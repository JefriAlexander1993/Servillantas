$calendar = $('#Calendar');

        today = new Date();
        y = today.getFullYear();
        m = today.getMonth();
        d = today.getDate();
        var token=$("#token").val();

        $calendar.fullCalendar({
            header: {
          //      left: 'prev,next today',
                center: 'title',
          //      right: 'month,agendaWeek,agendaDay,listWeek'
            },
        //    defaultView  : 'agendaFourDay',
            defaultDate  : today,
            selectable   : true,
            selectHelper : true,
            // titleFormat: {
            //     month: 'MMMM YYYY', // September 2015
            //     week: "MMMM D YYYY", // September 2015
            //     day: 'D MMM, YYYY'  // Tuesday, Sep 8, 2015
            // },
            views: {
                // week:{ titleFormat: "DD MMMM YYYY" },
                month: {
                    titleFormat: 'MMMM YYYY'
                }, // September 2015
                week: {
                    titleFormat: "MMMM D YYYY"
                }, // September 2015
                day: {
                    titleFormat: 'D MMM, YYYY'
                }, // Tuesday, Sep 8, 2015
                agendaFourDay: {
                    type: 'agenda',
                    duration: { days: 1 }
                  }
            },

            
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
            // events    : {!! json_encode( $data['jsonData'] ) !!},
    
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
             schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives'
        });