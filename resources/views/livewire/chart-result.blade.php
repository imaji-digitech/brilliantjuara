<div class="card-body" style="padding: 10px;">
    <div id="result"></div>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var options3 = {
                chart: {
                    height: 250,
                    type: 'bar',
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        endingShape: 'rounded',
                        columnWidth: '55%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Benar',
                    data: [{{ $right }}]
                }, {
                    name: 'Salah',
                    data: [{{ $wrong }}]
                }, {
                    name: 'Kosong',
                    data: [{{ $blank }}]
                }],
                xaxis: {
                    categories: [''],
                },
                yaxis: {
                    title: {
                        text: ''
                    }
                },
                fill: {
                    opacity: 1

                },
                tooltip: {},
                colors: ['#38a7b3', '#BC2C3D', '#d0d0d0']
            }

            var chart3 = new ApexCharts(
                document.querySelector("#{{$idComponent}}"),
                options3
            );
            {{--<h6 style="color: #38a7b3">Benar : {{ $rightAnswer }}</h6>--}}
            {{--<h6 style="color: #faa41b">Salah : {{ $wrongAnswer }}</h6>--}}
            {{--<h6 style="color: #">Kosong : {{ $blankAnswer }}</h6>--}}
            chart3.render();
        });
    </script>
</div>
