<div class="col-sm-12 row">
    <div class="col-sm-7" style="height: 450px;margin-top: 10px">
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
    <div class="col-sm-5" style=";margin-top: 10px">
        <livewire:dashboard-calendar :roomId="$room->id"/>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header" style="padding: 10px">
                <h4>Program Brilliant Juara</h4>
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
                                                @isset($bundle->bundlePrices[0])
                                                    @if($minus<$bundle->bundlePrices[0]->price)
                                                        @if($minus!=0)
                                                            <del>{{$bundle->bundlePrices[0]->price}} <br></del>
                                                        @endif
                                                            <del>Rp. {{ isset($bundle->bundlePrices[0])?number_format($bundle->bundlePrices[0]->price_cut-$minus):'' }}
                                                                <br></del>
                                                        Rp. {{ isset($bundle->bundlePrices[0])?number_format($bundle->bundlePrices[0]->price-$minus):'' }}
                                                    @endif
                                                @endisset
                                            </div>
                                            <br>
                                            <div style="text-align: center" class="row">
                                                @if(auth()->user()->haveProgram($bundle->id)==0)
                                                    @if($bundle->token_can_use==2)
                                                    <div class="col-md-12">
                                                        <form action="">
                                                            <input type="text" wire:model="token.{{$bundle->id}}"
                                                                   class="form-control"
                                                                   placeholder="token">
                                                        </form>
                                                        <button class="btn btn-warning-gradien col-md-12" type="button"
                                                                style="margin-top: 5px"
                                                                wire:click="activateToken({{$bundle->id}})">Redem
                                                        </button>
                                                    </div>
                                                    @endif
                                                    @isset($bundle->bundlePrices[0])
                                                        <div class="col-md-12" style="margin-top: 10px">
                                                            <form action="">
                                                                {{--                                                                <input--}}
                                                                {{--                                                                    type="number"--}}
                                                                {{--                                                                    wire:model="amount.{{$bundle->id}}"--}}
                                                                {{--                                                                    class="form-control"--}}
                                                                {{--                                                                    placeholder="Input jumlah pembelian">--}}
                                                                {{--                                                            </form>--}}
                                                                @if($bundle->referral_can_use==2)
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <input
                                                                                style="margin-top: 5px"
                                                                                type="text"
                                                                                wire:model="referral.{{$bundle->id}}"
                                                                                class="form-control"
                                                                                placeholder="Kode referral" required>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <button class="btn btn-success col-md-12"
                                                                                    type="button"
                                                                                    style="margin-top: 5px;height: 38px"
                                                                                    wire:click="checkReferral({{$bundle->id}})">
                                                                                Cek Referral
                                                                            </button>
                                                                        </div>
                                                                        <div class="col-sm-12 text-left"
                                                                             style="text-align: left">
                                                                            {{ $referralMsg }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </form>
                                                            <button class="btn btn-primary col-md-12" type="button"
                                                                    style="margin-top: 5px"
                                                                    wire:click="buy({{$bundle->id}})">Beli
                                                            </button>
                                                        </div>
                                                    @endisset
                                                @else
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-success" disabled="">Sudah terbeli
                                                            </button>
                                                        </div>
                                                    </div>
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
