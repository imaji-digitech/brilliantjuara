<div class="card-body" style="padding: 10px">
    <div class="default-datepicker" style="margin: 0">
        <div id="calendar" data-language="en"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            var events = [
                { Title: "Five K for charity", Date: new Date("02/02/2022") },
                { Title: "Dinner", Date: new Date("02/25/22") },
                { Title: "Meeting with manager", Date: new Date("02/01/2022") }
            ];
            $("#calendar").datepicker({
                onSelect: function(dateText) {
                    var date,
                        selectedDate = new Date(dateText),
                        i = 0,
                        event = null;

                    /* Determine if the user clicked an event: */
                    while (i < events.length && !event) {
                        date = events[i].Date;

                        if (selectedDate.valueOf() === date.valueOf()) {
                            event = events[i];
                        }
                        i++;
                    }
                    if (event) {
                        /* If the event is defined, perform some action here; show a tooltip, navigate to a URL, etc. */
                        alert(event.Title);
                    }
                },
                beforeShowDay: function(date) {
                    var result = [true, '', null];
                    var matching = $.grep(events, function(event) {
                        return event.Date.valueOf() === date.valueOf();
                    });

                    if (matching.length) {
                        result = [true, 'highlight-event', null];
                    }
                    return result;
                },
            })
        });
    </script>
</div>



