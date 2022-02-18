<x-admin>
    <x-slot name="title">
        Referral Umum
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card o-hidden">
                                <div class="bg-primary b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i class="fa fa-money"></i></div>
                                        <div class="media-body"><span class="m-0">Saldo Komisi</span>
                                            <h4 class="mb-0 counter">Rp. {{ number_format(auth()->user()->commission,0,",",".") }}</h4><i class="icon-bg" data-feather=""></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card o-hidden">
                                <div class="bg-secondary b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i class="fa fa-money"></i></div>
                                        <div class="media-body"><span class="m-0">Kode telah dipakai</span>
                                            <h4 class="mb-0 counter">{{ $c }}</h4><i class="icon-bg" data-feather=""></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card o-hidden">
                                <div class="bg-gray-50 b-r-4 card-body btn-gradient">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="media-body"><span class="m-0">Saldo komisi dicairkan</span>
                                            <h4 class="mb-0 counter">Rp. {{ number_format(auth()->user()->withdraws->sum('money'),0,",",".") }}</h4><i class="icon-bg" data-feather=""></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.referral.me.withdraw') }}">Pengambilan</a>
                            <livewire:table.main name="withdraw" :model="$withdraw"/>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <livewire:table.main name="referralMe" :model="$referral"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin>
