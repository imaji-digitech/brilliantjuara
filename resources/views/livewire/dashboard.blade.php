<div class="row">
    <div class="col-sm-7">
        <div class="col-xl-12 col-lg-12 morning-sec box-col-12">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="media">
                        <div class="media-body">
                            <div class="greeting-user">
                                <h4 class="f-w-600 font-primary" id="greeting">Good Night</h4>
                                <p>Hai Sobat Brilli {{ auth()->user()->name }} !</p>
{{--                                <div class="whatsnew-btn"><a class="btn btn-primary">Whats New !</a></div>--}}
                            </div>
                        </div>

                        <div class="badge-groups">
                            <div class="badge badge-primary f-10"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock me-1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg><span id="txt">3:23 AM</span></div>
                        </div>
                    </div>
                    <br>
                    <div class="p-3 row badge-primary" style="height: 100%;">
                        <i style="line-height: 20px" class="fa fa-warning col-md-1"></i>
                        <div class="col-md-11">
                            Link group telegram
                            <a href="https://t.me/brilliantjuaraofficial" target="_blank" style="color: white">
                                link
                                <i class="fa fa-link" style="color: white"></i>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="p-3 row badge-secondary" style="height: 100%">
                        <i style="line-height: 30px" class="fa fa-warning col-md-1"></i>
                        <p class="col-md-11">Penting : Gunakan Chrome versi terbaru dan jaringan yang stabil saat buka
                            Website Brilliant
                            Juara</p>
                    </div>
                    <div class="cartoon"><img class="img-fluid" src="{{ asset('assets/images/cartoon.png') }}" alt=""></div>
                </div>
            </div>
        </div>

        {{--        <div class="card">--}}
        {{--            <div class="card-body">--}}
        {{--                <div class="owl-carousel owl-theme" id="banner-dashboard" style="width: 100%">--}}
        {{--                    @foreach($banners as $banner)--}}
        {{--                        <div class="item"><img style="width: 100%" src="{{asset('storage/'.$banner->thumbnail)}}" alt="1"></div>--}}
        {{--                    @endforeach--}}
        {{--                </div>--}}
        {{--                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
        {{--                    <ol class="carousel-indicators">--}}
        {{--                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
        {{--                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
        {{--                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
        {{--                    </ol>--}}
        {{--                    <div class="carousel-inner">--}}
        {{--                        @foreach($banners as $index=>$banner)--}}
        {{--                            <div class="carousel-item {{$index==0?'active':''}}">--}}
        {{--                                <img class="d-block w-100" src="{{asset('storage/'.$banner->thumbnail)}}" alt="First slide">--}}
        {{--                            </div>--}}
        {{--                        @endforeach--}}
        {{--                    </div>--}}
        {{--                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
        {{--                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
        {{--                        <span class="sr-only">Previous</span>--}}
        {{--                    </a>--}}
        {{--                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
        {{--                        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
        {{--                        <span class="sr-only">Next</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        <div class="card">
{{--            <div class="card-header">--}}
{{--                <h5>Auto Height Example</h5>--}}
{{--            </div>--}}
            <div class="card-body">
                <div class="owl-carousel owl-theme owl-loaded owl-drag" id="owl-carousel-14">
                    <div class="owl-stage-outer owl-height" style="height: 279px;">
                        <div class="owl-stage"
                             style="transform: translate3d(0px, 0px, 0px); transition: 0s; width: 11396px;">
                            @foreach($banners as $index=>$banner)
                                <a href="{{ $banner->link }}" class="owl-item active" style="width: 1026px; margin-right: 10px;">
                                                            <div class="item"><img style="width: 100%" src="{{asset('storage/'.$banner->thumbnail)}}" alt="1"></div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev" data-bs-original-title=""
                                title=""><span aria-label="Previous">‹</span></button>
                        <button type="button" role="presentation" class="owl-next" data-bs-original-title=""
                                title=""><span aria-label="Next">›</span></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--        </div>--}}

    {{--    </div>--}}
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
                        <a href="{{ $announcement->content }}" class="media" target="_blank">
                            @if ($key+1 != $announcements->count())
                                <div class="activity-line"></div>
                            @endif
                            <div class="activity-dot-secondary"></div>
                            <div class="media-body"><span>{{ $announcement->title }}</span>
                                <p class="font-roboto">{{ $announcement->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
