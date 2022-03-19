<x-admin>
    <x-slot name="title">
        Try Out
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="card" style="width: 100px;height: 50px;line-height: 50px;text-align: center"><span
                        id="time">-:-</span></div>
                <script>
                    function startTimer(duration, display) {
                        var timer = duration, minutes, seconds, hours;
                        setInterval(function () {
                            minutes = parseInt(timer / 60, 10);
                            seconds = parseInt(timer % 60, 10);
                            hours = parseInt(minutes / 60, 10);
                            minutes = parseInt(minutes % 60, 10);

                            // hours = hours < 10 ? "0" + hours : hours;
                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            seconds = seconds < 10 ? "0" + seconds : seconds;

                            display.textContent = hours + ":" + minutes + ":" + seconds;
                            if (--timer < 0) {
                                timer = duration;
                                setTimeout(function () {
                                    location.reload();
                                }, 2000);
                            } else {

                            }
                        }, 1000);
                    }

                    document.addEventListener('DOMContentLoaded', () => {
                        var fiveMinutes = {{$time}},
                            display = document.querySelector('#time');
                        startTimer(fiveMinutes, display);
                    });
                </script>
                <livewire:exam :exam="$exam" :examUser="$examUser"/>
            </div>
        </div>
    </div>
</x-admin>
