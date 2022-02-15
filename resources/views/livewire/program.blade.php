<div class="col-sm-12 row">

    <!-- Modal -->
    <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="buy" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tentukan jumlah paket yang dibeli</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($bundleActive!=null)

                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script></script>
    <div class="card">
        <div class="card-body" style="padding: 10px">
            <div class="owl-carousel owl-theme" id="banner-dashboard">
                {{--                @foreach($banners as $banner)--}}
                <div class="item"><img src="{{ asset('assets/images/banner/4.png') }}" alt="1"></div>
                <div class="item"><img src="{{ asset('assets/images/banner/4.png') }}" alt="1"></div>
                {{--                @endforeach--}}
            </div>
        </div>
    </div>
    <div class="col-sm-7" style="height: 380px;">
        <div class="card" style="height: 100%;">
            <div class="card-header" style="padding: 15px">
                <h4>Kelasku</h4>


            </div>
            <div class="card-body" style="padding: 15px;overflow-y: scroll;">
                <h4>Try Out</h4>
                <div class="activity-timeline">
                    @foreach($myClass as $mc)
                        @isset($mc['exam'])
                            @foreach($mc['exam'] as $exam)
                                <a href="{{ route('admin.user.exam',$exam['exam']['slug']) }}" class="media">
                                    <div class="activity-dot-primary"></div>
                                    <div class="media-body"><span>{{ $exam['exam']['title'] }}</span>
                                    </div>
                                </a>
                            @endforeach
                        @endisset
                    @endforeach
                </div>
                <br>
                <h4>Bimbingan Belajar</h4>
                <div class="activity-timeline">
                    @foreach($myClass as $mc)
                        @isset($mc['course'])
                            @foreach($mc['course'] as $course)
                                <a href="{{ route('admin.user.course',$course['course']['slug']) }}" class="media"
                                   style="margin-top: 0">
                                    <div class="activity-dot-primary"></div>
                                    <div class="media-body">
                                        <span>{{ $course['course']['title'] }}</span>
                                    </div>
                                </a>
                            @endforeach
                        @endisset
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-5" style="height: 400px">
        <livewire:dashboard-calendar/>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header" style="padding: 10px">
                <h4>Program Brillian Juara</h4>
            </div>
            <div class="card-body" style="padding: 10px">
                <div class="product-wrapper-grid">
                    <div class="row">
                        @foreach($room->bundles->where('bundle_status_id',1) as $bundle)
                            <div class="col-xl-3 col-sm-6 xl-4">
                                <div class="card">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <img class="img-fluid"
                                                 src="{{asset('storage/'.$bundle->thumbnail)}}" alt="">
                                        </div>
                                        <div class="product-details">
                                            <h4>{{ $bundle->title }}</h4>
                                            <p>{{ $bundle->content }}</p>
                                            <p>
                                                @php($minus=0)
                                                @foreach($bundle->bundleDetails as $detail)
                                                    @isset($detail->course->title)
                                                        @if(auth()->user()->haveCourse($detail->course_id))
                                                            <del>{{$detail->course->title}} <br></del>
                                                            @php($minus+=$detail->course->price)
                                                        @else
                                                            {{$detail->course->title}} <br>
                                                        @endif
                                                    @else
                                                        @if(auth()->user()->haveExam($detail->exam_id))
                                                            <del> {{$detail->exam->title}} <br></del>
                                                            @php($minus+=$detail->exam->price)
                                                        @else
                                                            {{$detail->exam->title}} <br>
                                                        @endif
                                                    @endisset
                                                @endforeach
                                            </p>
                                            <div class="product-price">
                                                @if($minus<$bundle->bundlePrices[0]->price)
                                                    @if($minus!=0)
                                                        <del>{{$bundle->bundlePrices[0]->price}} <br></del>
                                                    @endif
                                                    Rp. {{ isset($bundle->bundlePrices[0])?$bundle->bundlePrices[0]->price-$minus:'' }}
                                                @endif

                                            </div>
                                            <div style="text-align: center">

                                                @if(auth()->user()->haveProgram($bundle->id)==0)
                                                    <div class="row" style="text-align: center">
                                                        <div class="col-md-6">
                                                            <form action="">
                                                                <input type="text" wire:model.defer="token"
                                                                       class="form-control"
                                                                       placeholder="token">
                                                            </form>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                        <button class="btn btn-warning-gradien col-md-4" type="button"
                                                                wire:click="activateToken({{$bundle->id}})">Redem
                                                        </button>
                                                    </div>
                                                    <br>
                                                    <div class="row" style="text-align: center">
                                                        <div class="col-md-6">
                                                            <form action="">
                                                                <input type="number" wire:model.defer="amount"
                                                                       class="form-control"
                                                                       placeholder="Input jumlah">
                                                            </form>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                        <button class="btn btn-primary col-md-4" type="button"
                                                                wire:click="buy({{$bundle->id}})">Beli
                                                        </button>
                                                    </div>
{{--                                                    <br>--}}
{{--                                                    <a href="#" style="width: 90%" class="btn btn-primary col-md-12"--}}
{{--                                                       wire:click="setBundle({{$bundle->id}})">Beli</a>--}}
                                                @else
                                                    <button class="btn btn-success" disabled="">Sudah terbeli</button>
                                                @endif

                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
