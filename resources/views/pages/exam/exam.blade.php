<x-admin>
    <x-slot name="title">
        Data exam
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="card" style="width: 100px;height: 50px;line-height: 50px;text-align: center"><span id="time">-:-</span></div>
                <script>
                    function startTimer(duration, display) {
                        var timer = duration, minutes, seconds;
                        setInterval(function () {
                            minutes = parseInt(timer / 60, 10);
                            seconds = parseInt(timer % 60, 10);

                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            seconds = seconds < 10 ? "0" + seconds : seconds;

                            display.textContent = minutes + ":" + seconds;

                            if (--timer < 0) {
                                timer = duration;
                                setTimeout(function () {
                                    window.location.href = "{{ route('admin.program.index',$exam->room->slug) }}";
                                }, 2000);
                            }else{

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
