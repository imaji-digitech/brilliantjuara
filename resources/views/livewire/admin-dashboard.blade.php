<div>
    <div class="row">
        <div class="col-4">
            <x-simple-card color="bg-primary" title="Peserta Brilliant Juara" icon="users" value="{{$data['users']}}"/>
        </div>
        <div class="col-4">
            <x-simple-card color="bg-secondary" title="Kunjungan bulan ini" icon="users" value="{{$data['logs']}}"/>
        </div>
        <div class="col-4">
            <x-simple-card color="bg-primary" title="Jumlah kota terjangkau" icon="users" value="{{$data['cities']}}"/>
        </div>

        <div class="card">
            <div class="card-header" style="padding: 20px">
                <h3>Kota terjangkau</h3>
            </div>
            <div class="card-body" style="padding: 20px">
                <div class="row">
                    @foreach($data['city_name'] as $city)
                        <div class="col-6">
                            {{ $city->city }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="padding: 20px">
                <h3>Kunjungan Bulan ini</h3>
            </div>
            <div class="card-body" style="padding: 20px">
                <div id="chart-currentlya"></div>
            </div>
        </div>

        <script>
            document.addEventListener('livewire:load', function () {
                // currently sale
                var options = {
                    series: [{
                        name: 'Kunjungan',
                        data: [
                            @foreach($this->data['visitor'] as $c)
                                '{{$c}}',
                            @endforeach
                        ]
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'category',
                        low: 1,
                        offsetX: 0,
                        offsetY: 0,
                        show: false,
                        categories: [
                            @foreach($date as $c)
                                '{{$c}}',
                            @endforeach
                        ],
                        labels: {
                            low: 0,
                            offsetX: 0,
                            show: false,
                        },
                        axisBorder: {
                            low: 0,
                            offsetX: 0,
                            show: false,
                        },
                    },
                    markers: {
                        strokeWidth: 3,
                        colors: "#ffffff",
                        strokeColors: [CubaAdminConfig.primary, CubaAdminConfig.secondary],
                        hover: {
                            size: 6,
                        }
                    },
                    yaxis: {
                        low: 0,
                        offsetX: 0,
                        offsetY: 0,
                        show: false,
                        labels: {
                            low: 0,
                            offsetX: 0,
                            show: false,
                        },
                        axisBorder: {
                            low: 0,
                            offsetX: 0,
                            show: false,
                        },
                    },
                    grid: {
                        show: false,
                        padding: {
                            left: 0,
                            right: 0,
                        }
                    },
                    colors: [CubaAdminConfig.primary, CubaAdminConfig.secondary],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.5,
                            stops: [0, 80, 100]
                        }
                    },
                    legend: {
                        show: false,
                    },
                    tooltip: {
                        x: {
                            format: 'MM'
                        },
                    },
                };

                var chart = new ApexCharts(document.querySelector("#chart-currentlya"), options);
                chart.render();
            });
        </script>

    </div>
</div>
