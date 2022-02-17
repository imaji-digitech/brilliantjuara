<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="padding: 10px">
                <h3>Hasil</h3>
            </div>
            <div class="card-body" style="padding: 10px;">
                <h6>Benar : {{ $rightAnswer }}</h6>
                <h6>Salah : {{ $wrongAnswer }}</h6>
                <h6>Kosong : {{ $blankAnswer }}</h6>
                <h6>Total nilai : {{ $totalPoint }}</h6>
                <br>
                <h6>Mulai Pengerjaan : {{ $examUser->created_at->format('d-m-Y H:i') }}</h6>
                <h6>Selesai Pengerjaan : {{ $examUser->updated_at->format('d-m-Y H:i') }}</h6>
                @php
                    $time=$examUser->updated_at->diffInSeconds($examUser->created_at);
                $minutes=intval($time/60);
                $seconds=$time%60
                @endphp
                <h6>Total waktu pengerjaan : {{ $minutes }} menit {{ $seconds }} detik</h6>
            </div>
            <div id="discussion"></div>
            <script>

            </script>
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
                    {{$number+1}}. {!! $questActive->examQuest->question  !!}

                    <div class="col">
                        <div class="mb-3 m-t-15 custom-radio-ml">
                            @php($alphabet=['','A','B','C','D','E'])
                            {{--                            {{$questActive->examQuest->answer}}--}}
                            @php($answer = $questActive->examQuest->answer== $questActive->answer)
                            @foreach($questActive->examQuest->examQuestChoices as $eqc)

                                <div class="form-check radio
                                @if($answer and $eqc->choice == $questActive->answer)
                                    radio-success
                                    @elseif(!$answer and $eqc->choice == $questActive->answer)
                                    radio-danger
                                    @elseif(!$answer and $eqc->choice == $questActive->examQuest->answer)
                                    radio-primary
                                    @else
                                    radio-option
                                    @endif">
                                    <input class="form-check-input" type="radio"
                                           {{ $questActive->answer==$eqc->choice?'checked':'' }} disabled>
                                    <label class="form-check-label @if($answer and $eqc->choice == $questActive->answer)
                                        text-success
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
                            Jawaban Benar : {{$alphabet[$questActive->examQuest->answer]}}
                            <br>
                            {!! $questActive->examQuest->discussion !!}
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
                        @if($number+1==$examUser->examAnswers->count())
                            <button class="btn btn-success mr-3" wire:click="setDone()">Selesai
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
