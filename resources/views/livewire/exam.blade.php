<div class="row">
    <div class="col-sm-4 desktop-only">
        <div class="card" style="padding: 0;">
            <div class="card-body text-center" style="padding: 0; padding-bottom: 10px">
                @foreach($examUser->examAnswers as $i=>$eu)
                    @if($i%8==0)
                        <br>
                    @endif
                    <button class="btn-sm btn {{$eu->answer!=0?'btn-success':'btn-danger'}}"
                            style="width: 30px;height: 30px; padding: 0;margin: 2px;
                                box-shadow: -3px 3px {{$eu->answer!=0?'green':'red'}},
                                -2px 2px {{$eu->answer!=0?'green':'pink'}},
                                -1px 1px {{$eu->answer!=0?'green':'pink'}};
                                border: 1px solid {{$eu->answer!=0?'green':'pink'}};"
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
                            @foreach($questActive->examQuest->examQuestChoices as $eqc)
                                <div class="form-check radio radio-primary">
                                    <input class="form-check-input" type="radio"
                                           wire:click="changeAnswer({{$eqc->choice}})" {{ $questActive->answer==$eqc->choice?'checked':'' }}>
                                    <label class="form-check-label"
                                           wire:click="changeAnswer({{$eqc->choice}})"> {!! $alphabet[$eqc->choice].". " .$eqc->answer !!}</label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <button class="ml-3 btn btn-warning" wire:click="changeAnswer(0)">Kosongkan</button>
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
                    @if($i%8==0)
                        <br>
                    @endif
                    <button class="btn-sm btn {{$eu->answer!=0?'btn-success':'btn-danger'}}"
                            style="width: 30px;height: 30px; padding: 0;margin: 2px;
                                box-shadow: -3px 3px {{$eu->answer!=0?'green':'red'}},
                                -2px 2px {{$eu->answer!=0?'green':'pink'}},
                                -1px 1px {{$eu->answer!=0?'green':'pink'}};
                                border: 1px solid {{$eu->answer!=0?'green':'pink'}};"
                            wire:click="changeActive({{$i}})">{{$i+1}} </button>
                @endforeach

            </div>
        </div>
    </div>
</div>
