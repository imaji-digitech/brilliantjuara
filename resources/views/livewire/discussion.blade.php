<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-4">
                <div class="card" style="height: 285px">
                    <div class="card-body" style="padding: 10px;">
                        <br><br>
                        <div class="text-center">
                            <h6 style="color: #38a7b3">Benar : {{ $rightAnswer }}</h6>
                            <h6 style="color: #faa41b">Salah : {{ $wrongAnswer }}</h6>
                            <h6 style="color: #BC2C3D">Kosong : {{ $blankAnswer }}</h6>
                        </div>
                        <br>
                        <div style="text-align: left">
                            <h6 style="color: #38a7b3">Mulai : {{ $examUser->created_at->format('d-m-Y H:i') }}</h6>
                            <h6 style="color: #faa41b">Selesai : {{ $examUser->updated_at->format('d-m-Y H:i') }}</h6>
                        </div>
                        @php
                            $time=$examUser->updated_at->diffInSeconds($examUser->created_at);
                        $minutes=intval($time/60);
                        $seconds=$time%60
                        @endphp
                        <h6 style="color: #BC2C3D">Waktu pengerjaan : {{ $minutes }} menit {{ $seconds }} detik</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="height: 285px;">
                    <div class="card-body" style="padding: 10px;text-align: center;">
                        <div>
                            <br><br><br>
                            <h5 >Total nilai : </h5>
                            <h4 style="color: #38a7b3">{{ number_format((float)($totalPoint/$totalHighValue*100), 2, '.', '') }}%</h4>
{{--                            <h5>Dari :</h5>--}}
{{--                            <h4 style="color: #faa41b">{{ $totalHighValue }}</h4>--}}
                            <h5>Keterangan :</h5>
                            <h4 style="color: {{ ($graduate=="Lulus")?'#38a7b3':'#BC2C3D' }}">{{ $graduate }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="height: 285px">
                        <livewire:chart-result idComponent="result" :right="$rightAnswer" :wrong="$wrongAnswer" :blank="$blankAnswer" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 desktop-only">
        <div class="card" style="padding: 0;">
            <div class="card-body text-center" style="padding: 0; padding-bottom: 10px">
                @foreach($examUser->examAnswers as $i=>$eu)
                    @php($answer = $eu->examQuest->answer== $eu->answer)
                    @if($i%8==0)
                        <br>
                    @endif
                    <button class="btn-sm btn
                        @if($eu->answer==0) btn-light @elseif($answer) btn-success @else btn-danger @endif"
                            style="width: 30px;height: 30px; padding: 0;margin: 2px;
                                box-shadow: -3px 3px @if($eu->answer==0) transparent @elseif($answer) green @else red @endif,
                                -2px 2px @if($eu->answer==0) transparent @elseif($answer) green @else red @endif,
                                -1px 1px @if($eu->answer==0) transparent @elseif($answer) green @else red @endif;
                                border: 1px solid @if($eu->answer==0) transparent @elseif($answer) green @else red @endif;"
                            wire:click="changeActive({{$i}})">{{$i+1}} </button>
                @endforeach

            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <body>
                @isset( $questActive->examQuest->question)
                    <div class="row">
                        <div class="col-1" style="width: 30px;padding: 0;margin: 0">{{$number+1}}. </div>
                        <div class="col-11" >
                            <p style="text-align: justify">{!! $questActive->examQuest->question  !!}</p>
                        </div>
                    </div>


                    <div class="col">
                        <div class="mb-3 m-t-15 custom-radio-ml">
                            @php($alphabet=['','A','B','C','D','E'])
                            {{--                            {{$questActive->examQuest->answer}}--}}
                            @php($answer = $questActive->examQuest->answer== $questActive->answer)
                            @foreach($questActive->examQuest->examQuestChoices as $eqc)

                                <div class="form-check radio
                                @if($answer and $eqc->choice == $questActive->answer)
                                    radio-primary
                                    @elseif(!$answer and $eqc->choice == $questActive->answer)
                                    radio-danger
                                    @elseif(!$answer and $eqc->choice == $questActive->examQuest->answer)
                                    radio-primary
                                    @else
                                    radio-option
                                    @endif">
                                    <input class="form-check-input radio-primary" type="radio"
                                           {{ $questActive->answer==$eqc->choice?'checked':'' }} disabled>
                                    <label class="form-check-label @if($answer and $eqc->choice == $questActive->answer)
                                        text-primary
@elseif(!$answer and $eqc->choice == $questActive->answer)
                                        text-danger
@elseif(!$answer and $eqc->choice == $questActive->examQuest->answer)
                                        text-primary
@else
                                        text-option
@endif">
                                        {!! $alphabet[$eqc->choice].". " .$eqc->answer !!}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div>

                            <br>
                            <div class="row">
                                <div class="col-1" style="width: 1px;display: inline-block"></div>
                                <div class="col-11" >
                                    <span>Jawaban Benar : </span><span class="text-primary">{{$alphabet[$questActive->examQuest->answer]}}</span>
                                    <p style="text-align: justify">{!! $questActive->examQuest->discussion  !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="float-end">
                        @if($number!=0)
                            <button class="btn btn-primary mr-3" wire:click="changeActive({{$number-1}})">Sebelumnya
                            </button>
                        @endif
                        @if($number+1!=$examUser->examAnswers->count())
                            <button class="btn btn-primary mr-3" wire:click="changeActive({{$number+1}})">Selanjutnya
                            </button>
                        @endif

                    </div>
                @endisset
            </div>
        </div>
    </div>
    <div class="col-sm-5 mobile-only">
        <div class="card" style="padding: 0;">
            <div class="card-body text-center" style="padding: 0; padding-bottom: 10px">
                @foreach($examUser->examAnswers as $i=>$eu)
                    @php($answer = $eu->examQuest->answer== $eu->answer)
                    @if($i%8==0)
                        <br>
                    @endif

                    <button class="btn-sm btn
                        @if($eu->answer==0) btn-light @elseif($answer) btn-success @else btn-danger @endif"
                            style="width: 30px;height: 30px; padding: 0;margin: 2px;
                                box-shadow: -3px 3px @if($eu->answer==0) transparent @elseif($answer) green @else red @endif,
                                -2px 2px @if($eu->answer==0) transparent @elseif($answer) green @else red @endif,
                                -1px 1px @if($eu->answer==0) transparent @elseif($answer) green @else red @endif;
                                border: 1px solid @if($eu->answer==0) transparent @elseif($answer) green @else red @endif;"
                            wire:click="changeActive({{$i}})">{{$i+1}} </button>
                @endforeach

            </div>
        </div>
    </div>
</div>
