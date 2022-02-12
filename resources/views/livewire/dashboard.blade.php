<div class="row">
    <div class="col-sm-7">
        <div class="card">
            <div class="card-body">
                <h4>Hai Sobar Brilli !!!</h4>
                <h5>{{ auth()->user()->name }}</h5>
                <h6>Selamat datang kembali</h6>
                <br>
                <h6>Informasi</h6>
                <div class="alert alert-warning inverse alert-dismissible fade show" role="alert"><i
                        class="icon-info-alt"></i>
                    <p>Penting : Gunakan Chrome versi terbaru dan jaringan yang yang stabil saat buka Website Brilliant
                        Juara</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="owl-carousel owl-theme" id="banner-dashboard">
                    @foreach($banners as $banner)
                        <div class="item"><img src="{{asset('storage/'.$banner->thumbnail)}}" alt="1"></div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-5">
        <livewire:dashboard-calendar/>
        <div class="card">
            <div class="card-header card-no-border">
                <h5>News & Updates</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body new-update pt-0">
                <div class="activity-timeline">
                    @foreach($announcements as $key=>$announcement)
                        <div class="media">
                            @if ($key+1 != $announcements->count())
                                <div class="activity-line"></div>
                            @endif
                            <div class="activity-dot-secondary"></div>
                            <div class="media-body"><span>{{ $announcement->title }}</span>
                                <p class="font-roboto">{{ $announcement->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
