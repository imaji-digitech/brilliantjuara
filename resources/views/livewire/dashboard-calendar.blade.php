<div>
    <div class="card" style="height: 450px">
        <div class="card-body" style="padding: 10px">
            <div class="default-datepicker" style="margin: 0">
                <div id="calendar" data-language="en"></div>
            </div>
            <div class="activity-timeline" style="padding: 10px; overflow-y: scroll; height: 100px" id="events">
                @foreach($eventNow as $event)
                    <div class='media' style='margin-top: 0'>
                        <div class="activity-dot-primary"></div>
                        <div class="media-body"><span>{{$event->title}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    var events = [
                        @foreach($events as $event)
                        {Title: "{{$event->title}}", Date: new Date("{{$event->created_at->format('m/d/Y')}}")},
                        @endforeach
                    ];
                    $("#calendar").datepicker({

                        onSelect: function (dateText) {
                            $("#events").empty();
                            var date,
                                selectedDate = new Date(dateText),
                                i = 0,
                                event = '';
                            var some=[];
                            while (i < events.length) {
                                date = events[i].Date;

                                if (selectedDate.valueOf() === date.valueOf()) {
                                    event = events[i];
                                    some.push(events[i])
                                }
                                i++;
                            }
                            console.log(some)
                            if (event) {

                                some.forEach(myFunction);
                                function myFunction(item, index) {
                                    $("#events").prepend(
                                        "<div class='media' style='margin-top: 0'> <div class='activity-dot-primary'></div> <div class='media-body'><span>"+item.Title+"</span> </div> </div>"
                                    );
                                }
                            }
                        },
                        beforeShowDay: function (date) {
                            var result = [true, '', null];
                            var matching = $.grep(events, function (event) {
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
    </div>

</div>
